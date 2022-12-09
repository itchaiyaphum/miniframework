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
            // redirect('/');
        }
    }

    public function _check_staff()
    {
        $profile = $this->app->profile_lib->get_profile();

        if ($profile->user_type != 'staff') {
            // redirect('/');
        }
    }
}
