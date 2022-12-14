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
        $this->_init_library();

        $method = (isset($_GET['action'])) ? $_GET['action'] : $method;
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
        define('PATH', realpath('./').DS);

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

        require_once APPPATH.DS.'core'.DS.'base_app.php';
        require_once APPPATH.DS.'core'.DS.'library.php';
        require_once APPPATH.DS.'core'.DS.'controller.php';
        require_once APPPATH.DS.'core'.DS.'common.php';
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
        // core library
        $this->library('session_lib');
        $this->library('input_lib');
        $this->library('form_validation_lib');
        $this->library('database_lib');
        $this->library('upload_lib');

        // general library
        $this->library('auth_lib');
        $this->library('users_lib');
        $this->library('profile_lib');
        $this->library('province_lib');

        // admin library
        $this->library('admin_profile_lib');
        $this->library('admin_restaurant_types_lib');
        $this->library('admin_restaurants_lib');
        $this->library('admin_riders_lib');
        $this->library('admin_customer_lib');

        // customer library
        $this->library('customer_profile_lib');
        $this->library('customer_restaurants_lib');
        $this->library('customer_cart_lib');
        $this->library('customer_history_order_lib');
        $this->library('customer_food_review_lib');

        // rider library
        $this->library('rider_profile_lib');
        $this->library('rider_order_delivery_lib');
        $this->library('rider_history_delivery_lib');

        // staff library
        $this->library('staff_profile_lib');
        $this->library('staff_food_category_lib');
        $this->library('staff_food_menus_lib');
        $this->library('staff_ordering_lib');
        $this->library('staff_reporting_lib');
    }

    public static function &get_instance()
    {
        return self::$instance;
    }
}
