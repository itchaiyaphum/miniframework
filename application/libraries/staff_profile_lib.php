<?php

class Staff_profile_lib extends Library
{
    public function get_restaurant_types()
    {
        $sql = 'SELECT * FROM `restaurant_type` WHERE `status`=1';
        $query = $this->app->database_lib->query($sql);
        $items = $query->result();

        return $items;
    }

    public function register($register_data = [])
    {
        // หากมี อีเมล์ อยู่ในระบบแล้ว
        if ($this->app->auth_lib->check_email_exists($register_data['email'])) {
            $this->app->form_validation_lib->set_error("อีเมล์ ({$register_data['email']}) นี้ถูกใช้ในการลงทะเบียนแล้ว กรุณาใช้อีเมล์อื่น!");

            return false;
        }

        // profile thumbnail
        $thumbnail = '/storage/profile/no-thumbnail.png';

        // upload profile thumbnail
        $upload_config = [
            'upload_path' => 'storage/profile',
        ];
        $thumbnail_data = $this->app->upload_lib->do_upload('thumbnail', $upload_config);
        if ($thumbnail_data['status']) {
            $thumbnail = '/storage/profile/'.$thumbnail_data['new_file_name'];
        }

        // restaurant_thumbnail
        $restaurant_thumbnail = '/storage/restaurant/no-thumbnail.png';

        // upload restaurant_thumbnail
        $restaurant_upload_config = [
            'upload_path' => 'storage/restaurant',
        ];
        $restaurant_thumbnail_data = $this->app->upload_lib->do_upload('restaurant_thumbnail', $restaurant_upload_config);
        if ($restaurant_thumbnail_data['status']) {
            $restaurant_thumbnail = '/storage/restaurant/'.$restaurant_thumbnail_data['new_file_name'];
        }

        // จัดเตรียมข้อมูล เพื่อบันทึกลงใน database
        $hash_password = md5($register_data['password']);
        $data = [
            'firstname' => $register_data['firstname'],
            'lastname' => $register_data['lastname'],
            'user_type' => 'staff',
            'mobile_no' => $register_data['mobile_no'],
            'address' => $register_data['address'],
            'thumbnail' => $thumbnail,
            'email' => $register_data['email'],
            'password' => $hash_password,

            'restaurant_name' => $register_data['restaurant_name'],
            'restaurant_type_id' => $register_data['restaurant_type_id'],
            'restaurant_address' => $register_data['restaurant_address'],
            'restaurant_thumbnail' => $restaurant_thumbnail,

            'status' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ];

        // บันทึกข้อมูลลงใน database
        return $this->app->database_lib->insert('user', $data);
    }

    public function save($data = [])
    {
        // ดึงข้อมูล profile ปัจจุบันขึ้นมา
        $profile = $this->app->profile_lib->get_profile();
        $profile_id = $profile->id;

        // ดึงข้อมูลเดิมมาจาก database
        $sql = "SELECT * FROM `user` WHERE `id`={$profile_id}";
        $data_db = $this->app->database_lib->query($sql)->row();

        if (empty($data_db)) {
            return false;
        }

        // หากมีการกรอกอีเมล์เข้ามาใหม่ ที่ไม่ตรงกับฐานข้อมูลปัจจุบัน แสดงว่าต้องการเปลี่ยนอีเมล์
        if ($data_db['email'] != $data['email']) {
            // ตรวจสอบว่าใน database มี email ซ้ำหรือไม่
            if ($this->app->auth_lib->check_email_exists($data['email'])) {
                $this->app->form_validation_lib->set_error("อีเมล์ ({$data['email']}) นี้ถูกใช้งานในระบบเราแล้ว กรุณาใช้อีเมล์อื่น!");

                return false;
            }
        }

        $thumbnail = $data_db['thumbnail'];
        // หากมีการอัพโหลดรูปภาพ เข้ามาใหม่ ให้อัพโหลดรูปภาพใหม่
        if (isset($_FILES['thumbnail'])) {
            // upload thumbnail
            $upload_config = [
                'upload_path' => 'storage/profile',
            ];
            $thumbnail_data = $this->app->upload_lib->do_upload('thumbnail', $upload_config);
            if ($thumbnail_data['status']) {
                $thumbnail = '/storage/profile/'.$thumbnail_data['new_file_name'];
            }
        }

        $restaurant_thumbnail = $data_db['restaurant_thumbnail'];
        // หากมีการอัพโหลดรูปภาพ (ร้านอาหาร) เข้ามาใหม่ ให้อัพโหลดรูปภาพใหม่
        if (isset($_FILES['restaurant_thumbnail'])) {
            // upload restaurant_thumbnail
            $restaurant_upload_config = [
                'upload_path' => 'storage/restaurant',
            ];
            $restaurant_thumbnail_data = $this->app->upload_lib->do_upload('restaurant_thumbnail', $restaurant_upload_config);
            if ($restaurant_thumbnail_data['status']) {
                $restaurant_thumbnail = '/storage/restaurant/'.$restaurant_thumbnail_data['new_file_name'];
            }
        }

        $hash_password = $data_db['password'];
        // หากมีการกรอกรหัสผ่านเข้ามา ให้ตั้งรหัสผ่านใหม่
        if (!empty($data['password'])) {
            $hash_password = md5($data['password']);
        }

        // จัดเตรียมข้อมูล เพื่อบันทึกลงใน database
        $data_update = [
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'mobile_no' => $data['mobile_no'],
            'address' => $data['address'],
            'thumbnail' => $thumbnail,
            'email' => $data['email'],
            'password' => $hash_password,

            'restaurant_name' => $data['restaurant_name'],
            'restaurant_type_id' => $data['restaurant_type_id'],
            'restaurant_address' => $data['restaurant_address'],
            'restaurant_thumbnail' => $restaurant_thumbnail,

            'updated_at' => now(),
        ];

        $where = "`id`={$profile_id}";

        // บันทึกข้อมูลลงใน database
        return $this->app->database_lib->update('user', $data_update, $where);
    }
}
