<?php

class App
{
    private static $instance;
    public $environment = 'development';
    public $config = null;
    public $db = null;
    public $input = null;
    public $form_validation = null;
    public $session = null;
    public $data = null;

    public function __construct()
    {
        self::$instance = &$this;
    }

    public function start($controller_name = 'homepage', $method = 'index', $params = [])
    {
        $this->_init_environment();
        $this->_init_base();
        $this->_init_database();
        $this->_init_input();
        $this->_init_form_validation();
        $this->_init_session();
        $this->_init_library();
        $this->_init_controller($controller_name, $method, $params);

        return $this;
    }

    // load user libraries
    public function library($library_name = '')
    {
        $library_path = APPPATH.DS.'libraries'.DS.$library_name.'.php';
        require_once $library_path;
        $class = ucfirst($library_name);
        $obj = new $class($this);
        $this->$library_name = $obj;

        return $obj;
    }

    // load user views
    public function view($view_name = '', $data = '', $return = false)
    {
        // set view data to app object
        $this->data = $data;

        $view_path = APPPATH.DS.'views'.DS.$view_name.'.php';

        if ($return) {
            ob_start();
            include $view_path;

            return ob_get_clean();
        }

        require_once $view_path;
    }

    private function _init_environment()
    {
        date_default_timezone_set('Asia/Bangkok');

        define('DS', DIRECTORY_SEPARATOR);
        define('APPPATH', realpath('application').DS);

        if (preg_match('/dev./i', $_SERVER['SERVER_NAME'])) {
            error_reporting(-1);
            ini_set('display_errors', 1);
            $this->environment = 'development';
        } else {
            $this->environment = 'production';
        }
    }

    private function _init_base()
    {
        require_once APPPATH.DS.'config'.DS.$this->environment.'.php';
        $this->config = $config;

        require_once APPPATH.DS.'core'.DS.'base_object.php';
        require_once APPPATH.DS.'core'.DS.'base_library.php';
        require_once APPPATH.DS.'core'.DS.'controller.php';
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

    private function _init_form_validation()
    {
        require_once 'form_validation.php';
        $class = ucfirst('form_validation');
        $obj = new $class($this);
        $this->form_validation = $obj;
    }

    private function _init_session()
    {
        require_once 'session.php';
        $class = ucfirst('session');
        $obj = new $class($this);
        $this->session = $obj;
    }

    private function _init_controller($controller_name = false, $method = 'index', $params = [])
    {
        // user controller
        $controller_path = APPPATH.DS.'controllers'.DS.$controller_name.'.php';
        require_once $controller_path;
        $class = ucfirst($controller_name);
        $obj = new $class($this);
        call_user_func_array([&$obj, $method], $params);
    }

    private function _init_library()
    {
        $this->library('auth_lib');
        $this->library('users_lib');
        $this->library('profile_lib');
        $this->library('province_lib');
        $this->library('admin_users_lib');
    }

    public static function &get_instance()
    {
        return self::$instance;
    }
}
