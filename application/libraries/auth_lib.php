<?php

class Auth_lib extends Library
{
    public function is_login()
    {
        $is_login = $this->app->session->get('is_login', false);
        if ($is_login == true || $is_login == 1) {
            return true;
        }

        return false;
    }

    public function login($email = '', $password = '')
    {
        $hash_password = md5($password);

        $query = $this->app->db->query('SELECT * FROM users');
        $results = $query->result();

        if (count($results)) {
            foreach ($results as $row) {
                if ($row['email'] == $email && $row['password'] == $hash_password) {
                    $this->set_login_session_by_email($email);

                    return true;
                }
            }
        }

        $this->app->form_validation->set_error('อีเมล์ หรือ รหัสผ่าน ไม่ถูกต้อง, กรุณาลองใหม่อีกครั้ง!');

        return false;
    }

    public function register($register_data = [])
    {
        // check email exists
        if ($this->_check_email_exists($register_data['email'])) {
            $this->app->form_validation->set_error("อีเมล์ ({$register_data['email']}) นี้ถูกใช้ในการลงทะเบียนแล้ว กรุณาใช้อีเมล์อื่น!");

            return false;
        }

        // preparing data
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

        // insert register data to database
        return $this->app->db->insert('users', $data);
    }

    // external call for set login session
    public function set_login_session($profile)
    {
        $this->app->session->set('is_login', true);
        $this->app->session->set('profile_id', $profile->id);
        $this->app->session->set('email', $profile->email);
        $this->app->session->set('firstname', $profile->firstname);
        $this->app->session->set('lastname', $profile->lastname);
        $this->app->session->set('status', $profile->status);
        $this->app->session->set('user_type', $profile->user_type);
    }

    // internal call for set login session by email
    private function set_login_session_by_email($email = '')
    {
        $profile = $this->app->profile_lib->get_profile($email);

        $this->set_login_session($profile);
    }

    public function reset_password()
    {
    }

    public function forget_password()
    {
    }

    public function activate()
    {
    }

    public function logout()
    {
        return $this->app->session->destroy();
    }

    private function _check_email_exists($email = null)
    {
        $query = $this->app->db->query("SELECT * FROM users WHERE email='{$email}'");

        return (!empty($query->result())) ? true : false;
    }
}
