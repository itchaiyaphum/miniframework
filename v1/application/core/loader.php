<?php

class Loader
{
    public $app = null;

    public function __construct($app = null)
    {
        $this->app = $app;
    }

    public function view($view_name, $data = '', $return = false)
    {
        $view_path = APPPATH.DS.'views'.DS.$view_name.'.php';
        require_once $view_path;
    }

    public function library($library_name = '')
    {
        $library_path = APPPATH.'libraries'.DS.$library_name.'.php';
        require_once $library_path;
        $class = ucfirst($library_name);
        $obj = new $class();
        $obj->app = $this->app;

        return $obj;
    }
}
