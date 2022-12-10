<?php

class Staff_profile_lib extends Library
{
    public function get_restaurant_types()
    {
        $sql = 'SELECT * FROM `restaurant_types` WHERE `status`=1';
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

            'restaurant_name' => $register_data['address'],
            'restaurant_type_id' => $register_data['address'],
            'restaurant_address' => $register_data['address'],
            'restaurant_thumbnail' => $restaurant_thumbnail,

            'status' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ];

        // บันทึกข้อมูลลงใน database
        return $this->app->database_lib->insert('users', $data);
    }

    public function save()
    {
        return true;
    }
}
