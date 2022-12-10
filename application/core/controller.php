<?php

class Controller extends Base_app
{
    public function __construct($app)
    {
        parent::__construct($app);
        // $this->_check_login();
    }

    private function _check_login()
    {
        if (!$this->app->auth_lib->is_login()) {
            // redirect('/auth_login.php');
        }
    }

    public function _check_admin()
    {
        $profile = $this->app->profile_lib->get_profile();

        if ($profile->user_type != 'admin') {
            // redirect('/admin.php');
            return true;
        }
    }

    public function _check_customer()
    {
        $profile = $this->app->profile_lib->get_profile();

        if ($profile->user_type != 'customer') {
            // redirect('/customer.php');
            return true;
        }
    }

    public function _check_staff()
    {
        $profile = $this->app->profile_lib->get_profile();

        if ($profile->user_type != 'staff') {
            // redirect('/staff.php');
            return true;
        }
    }

    public function _check_rider()
    {
        $profile = $this->app->profile_lib->get_profile();

        if ($profile->user_type != 'rider') {
            // redirect('/rider.php');
            return true;
        }
    }
}
