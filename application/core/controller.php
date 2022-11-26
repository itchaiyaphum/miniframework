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

        if (!$auth->is_login()) {
            redirect('/auth_login.php');
        }
    }
}
