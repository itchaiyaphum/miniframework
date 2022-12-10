<?php

class Profile_lib extends Library
{
    public $id = 0;
    public $firstname = '';
    public $lastname = '';
    public $email = '';
    public $address = '';
    public $thumbnail = '';
    public $mobile_no = '';
    public $user_type = '';
    public $status = 0;
    public $password = '';

    public $restaurant_name = '';
    public $restaurant_type_id = 0;
    public $restaurant_address = 0;
    public $restaurant_thumbnail = 0;

    public function __construct($app)
    {
        parent::__construct($app);
        $this->get_profile();
    }

    public function is_login()
    {
        return $this->app->auth_lib->is_login();
    }

    public function get_profile($email = null)
    {
        (!empty($email)) or $email = $this->app->session_lib->get('email');

        $query = $this->app->database_lib->query('SELECT * FROM users WHERE email="'.$email.'"');
        $result = $query->row();

        if (!empty($result)) {
            foreach ($result as $key => $val) {
                $this->{$key} = $val;
            }
        }

        return $this;
    }

    public function get_profile_by_id($id = 0)
    {
        $query = $this->app->database_lib->query("SELECT * FROM users WHERE id={$id}");
        $result = $query->row();

        if (!empty($result)) {
            foreach ($result as $key => $val) {
                $this->{$key} = $val;
            }
        }

        return $this;
    }

    public function save($profile_data = [])
    {
        $thumbnail = '/storage/profiles/no-thumbnail.jpg';

        // preparing data
        $data = [
            'firstname' => $profile_data['firstname'],
            'lastname' => $profile_data['lastname'],
            'email' => $profile_data['email'],
            'address' => $profile_data['address'],
            'zip_code' => $profile_data['zip_code'],
            'province_id' => $profile_data['province_id'],
            'mobile_no' => $profile_data['mobile_no'],
            'thumbnail' => $thumbnail,
            'updated_at' => now(),
        ];

        $where = 'id='.$profile_data['id'];

        // insert register data to database
        return $this->app->database_lib->update('users', $data, $where);
    }

    public function change_password($profile_data = [])
    {
        // get current user profile data
        $profile = $this->app->profile_lib->get_profile();

        $hash_current_password = md5($profile_data['current_password']);
        $hash_new_password = md5($profile_data['new_password']);
        $hash_confirm_new_password = md5($profile_data['confirm_new_password']);

        // check current_password is correct
        if ($profile->password != $hash_current_password) {
            $this->app->form_validation_lib->set_error('คุณกรอกรหัสผ่านปัจจุบันไม่ถูกต้อง, กรุณาลองใหม่อีกครั้ง!');

            return false;
        }

        // check new_password match confirm_new_password
        if ($hash_new_password != $hash_confirm_new_password) {
            $this->app->form_validation_lib->set_error('รหัสผ่านใหม่ ไม่ตรงกับ ยืนยันรหัสผ่านใหม่, กรุณาลองใหม่อีกครั้ง!');

            return false;
        }

        // preparing data
        $data = [
            'password' => $hash_new_password,
            'updated_at' => now(),
        ];

        $where = 'id='.$profile_data['id'];

        // insert register data to database
        return $this->app->database_lib->update('users', $data, $where);
    }

    public function get_user_type()
    {
        return $this->user_type;
    }
}
