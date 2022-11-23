<?php

class Auth_lib extends Base_object
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
                    $this->set_login_session($email);

                    return true;
                }
            }
        }

        $this->app->form_validation->set_error('อีเมล์ หรือ รหัสผ่าน ไม่ถูกต้อง, กรุณาลองใหม่อีกครั้ง!');

        return false;
    }

    public function set_login_session($email = '')
    {
        $this->app->session->set('is_login', true);
        $this->app->session->set('email', $email);
        $this->app->session->set('firstname', 'aodto');
        $this->app->session->set('lastname', 'wk');
        $this->app->session->set('status', 1);
    }

    public function register()
    {
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
}
