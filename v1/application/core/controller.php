<?php

class Controller
{
    public $app = null;

    public function __construct($app = null)
    {
        $this->app = $app;
    }

    public function start($controller = false)
    {
        $action = $this->app->input->get('action', 'index');
        $controller_path = APPPATH.'controllers'.DS.$controller.'.php';
        require_once $controller_path;
        $class = ucfirst($controller);
        $obj = new $class();
        $obj->app = $this->app;
        call_user_func_array([&$obj, $action], []);
    }
}
