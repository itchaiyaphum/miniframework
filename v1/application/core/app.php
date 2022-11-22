<?php

class App
{
    public $load = null;
    public $db = null;
    public $input = null;

    public function __construct()
    {
        $this->_init_loader();
        $this->_init_database();
        $this->_init_input();
    }

    public function start($controller_name = 'homepage')
    {
        $this->_init_controller($controller_name);
    }

    private function _init_controller($controller_name = false)
    {
        require_once 'controller.php';
        $class = ucfirst('controller');
        $obj = new $class($this);
        $obj->start($controller_name);
    }

    private function _init_loader()
    {
        require_once 'loader.php';
        $class = ucfirst('loader');
        $obj = new $class($this);
        $this->load = $obj;
    }

    private function _init_database()
    {
        require_once 'database.php';
        $class = ucfirst('database');
        $obj = new $class($this);
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
