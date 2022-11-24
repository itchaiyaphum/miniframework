<?php

class Profile_lib extends Base_object
{
    public $firstname = '';
    public $lastname = '';
    public $email = '';
    public $type = 'customer';
    public $status = 0;

    public function __construct($app)
    {
        parent::__construct($app);
        $this->get_profile();
    }

    public function is_login()
    {
        return $this->app->auth_lib->is_login();
    }

    public function get_profile()
    {
        $email = $this->app->session->get('email');
        $query = $this->app->db->query('SELECT * FROM users WHERE email="'.$email.'"');
        $result = $query->row();

        if (!empty($result)) {
            foreach ($result as $key => $val) {
                $this->{$key} = $val;
            }
        }

        return $this;
    }

    public function get_user_type()
    {
        return $this->type;
    }
}
