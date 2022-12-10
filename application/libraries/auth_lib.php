<?php

class Auth_lib extends Library
{
    // ตรวจสอบว่ามีการ login แล้วหรือยัง
    public function is_login()
    {
        $is_login = $this->app->session_lib->get('is_login', false);
        if ($is_login == true || $is_login == 1) {
            return true;
        }

        return false;
    }

    // ตรวจสอบการ login ว่าถูกต้องหรือไม่
    public function login($email = '', $password = '')
    {
        // นำ รหัสผ่านที่กรอก มาเข้ารหัส md5 ก่อน เพื่อใช้สำหรับตรวจสอบกับ database
        $hash_password = md5($password);

        // ดึงค่ามาจาก database ทั้งหมด
        $query = $this->app->database_lib->query('SELECT * FROM users');
        $results = $query->result();

        if (count($results)) {
            foreach ($results as $row) {
                if ($row['email'] == $email && $row['password'] == $hash_password) {
                    // หากยังไม่มีการอนุมัติการใช้งาน
                    if ($row['status'] == 0) {
                        $this->app->form_validation_lib->set_error("อีเมล์ {$row['email']} ลงทะเบียนเรียบร้อยแล้ว แต่ยังไม่ได้รับอนุญาติให้เข้าใช้งาน, กรุณารอผู้ดูแลระบบอนุมัติสักครู่!");

                        return false;
                    }
                    // หากถูกระงับการใช้งาน
                    elseif ($row['status'] == (-1)) {
                        $this->app->form_validation_lib->set_error("อีเมล์ {$row['email']} ถูกระงับการใช้งานชั่วคราว, กรุณาติดต่อผู้ดูแลระบบ!");

                        return false;
                    }

                    // หากอนุญาติให้เข้าใช้งานแล้ว, ให้ดำเนินการ set ค่า login ได้เลย
                    $this->set_login_session_by_email($email);

                    return true;
                }
            }
        }

        // หาก อีเมล์ หรือ รหัสผ่าน ไม่ถูกต้อง, จะส่งข้อมูลแจ้งเตือนให้ทราบ
        $this->app->form_validation_lib->set_error('อีเมล์ หรือ รหัสผ่าน ไม่ถูกต้อง, กรุณาลองใหม่อีกครั้ง!');

        return false;
    }

    // TODO: ลงทะเบียนใหม่ (ไม่ใช้งานแล้ว)
    public function register($register_data = [])
    {
        // หากมี อีเมล์ อยู่ในระบบแล้ว
        if ($this->check_email_exists($register_data['email'])) {
            $this->app->form_validation_lib->set_error("อีเมล์ ({$register_data['email']}) นี้ถูกใช้ในการลงทะเบียนแล้ว กรุณาใช้อีเมล์อื่น!");

            return false;
        }

        // จัดเตรียมข้อมูล เพื่อบันทึกลงใน database
        $hash_password = md5($register_data['password']);
        $data = [
            'firstname' => $register_data['firstname'],
            'lastname' => $register_data['lastname'],
            'user_type' => $register_data['user_type'],
            'email' => $register_data['email'],
            'password' => $hash_password,
            'status' => 0,
            'thumbnail' => '/storage/profiles/no-thumbnail.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ];

        // บันทึกข้อมูลลงใน database
        return $this->app->database_lib->insert('users', $data);
    }

    // ตั้งค่า session สำหรับการ login
    public function set_login_session($profile)
    {
        $this->app->session_lib->set('is_login', true);
        $this->app->session_lib->set('profile_id', $profile->id);
        $this->app->session_lib->set('email', $profile->email);
        $this->app->session_lib->set('firstname', $profile->firstname);
        $this->app->session_lib->set('lastname', $profile->lastname);
        $this->app->session_lib->set('status', $profile->status);
        $this->app->session_lib->set('user_type', $profile->user_type);
    }

    // ตั้งค่า session โดยใช้ email
    private function set_login_session_by_email($email = '')
    {
        $profile = $this->app->profile_lib->get_profile($email);

        $this->set_login_session($profile);
    }

    // อนุมัติให้เข้าใช้งานได้
    public function set_active($id = 0)
    {
        $data = [
            'status' => 1,
        ];

        $where = "id={$id}";

        return $this->app->database_lib->update('users', $data, $where);
    }

    // ยกเลิกการอนุมัติให้เข้าใช้งาน
    public function set_inactive($id = 0)
    {
        $data = [
            'status' => 0,
        ];

        $where = "id={$id}";

        return $this->app->database_lib->update('users', $data, $where);
    }

    // ระงับการใช้งานชั่วคราว
    public function set_terminate($id = 0)
    {
        $data = [
            'status' => (-1),
        ];

        $where = "id={$id}";

        return $this->app->database_lib->update('users', $data, $where);
    }

    // ออกจากระบบ
    public function logout()
    {
        return $this->app->session_lib->destroy();
    }

    // ตรวจสอบว่ามีอีเมล์ในระบบ database อยู่หรือไม่
    public function check_email_exists($email = null)
    {
        $query = $this->app->database_lib->query("SELECT * FROM users WHERE email='{$email}'");

        return (!empty($query->result())) ? true : false;
    }
}
