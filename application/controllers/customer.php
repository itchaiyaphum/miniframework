<?php

class Customer extends Controller
{
    public function __construct($app)
    {
        parent::__construct($app);
        $this->_check_customer();
    }

    public function index()
    {
        $data = [];
        $data['title'] = 'สำหรับลูกค้า (customer) - ระบบสั่งอาหารออนไลน์';
        $data['active_menu'] = 'index';
        $data['left_menu'] = $this->app->view('customer/menu', $data, true);

        $this->app->view('header', $data);
        $this->app->view('nav', $data);
        $this->app->view('customer/index', $data);
        $this->app->view('footer');
    }
}
