<?php

class Controller extends Base_object
{
    public function __construct($app)
    {
        parent::__construct($app);
        $this->_check_login();
    }

    private function _check_login()
    {
        $auth = $this->app->library('auth_lib');
        $profile = $this->app->library('profile_lib');

        if ($auth->is_login()) {
            if ($profile->type == 'admin') {
                redirect('/admin');
            } elseif ($profile->type == 'staff') {
                redirect('/staff');
            } elseif ($profile->type == 'rider') {
                redirect('/rider');
            } elseif ($profile->type == 'customer') {
                redirect('/');
            }
        }
    }
}
