<?php

class App
{
    public $db = null;
    public $input = null;
    public $data = null;

    public function start($controller_name = 'homepage', $method = 'index', $params = [])
    {
        $this->_init_base();
        $this->_init_database();
        $this->_init_input();
        $this->_controller($controller_name, $method, $params);

        return $this;
    }

    public function library($library_name = '')
    {
        $library_path = APPPATH.DS.'libraries'.DS.$library_name.'.php';
        require_once $library_path;
        $class = ucfirst($library_name);
        $obj = new $class($this);

        return $obj;
    }

    public function view($view_name = '', $data = '')
    {
        // set view data to app object
        $this->data = $data;

        $view_path = APPPATH.DS.'views'.DS.$view_name.'.php';
        require_once $view_path;
    }

    private function _controller($controller_name = false, $method = 'index', $params = [])
    {
        // user controller
        $controller_path = APPPATH.DS.'controllers'.DS.$controller_name.'.php';
        require_once $controller_path;
        $class = ucfirst($controller_name);
        $obj = new $class($this);
        call_user_func_array([&$obj, $method], $params);
    }

    private function _init_base()
    {
        require_once APPPATH.DS.'core'.DS.'base_object.php';
        require_once APPPATH.DS.'core'.DS.'common.php';
    }

    private function _init_database()
    {
        require_once 'database.php';
        $class = ucfirst('database');
        $obj = new $class($this);
        $obj->connect_db();
        $this->db = $obj;
    }

    private function _init_input()
    {
        require_once 'input.php';
        $class = ucfirst('input');
        $obj = new $class($this);
        $this->input = $obj;
    }
}
