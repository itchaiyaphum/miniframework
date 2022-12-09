<?php

class Staff_orders extends Controller
{
    public function __construct($app)
    {
        parent::__construct($app);
        // $this->_check_staff();
    }

    public function index()
    {
        $data = [];
        $data['title'] = 'รายการสั่งซื้ออาหาร - ระบบสั่งอาหารออนไลน์';
        $data['active_menu'] = 'orders';
        $data['left_menu'] = $this->app->view('staff/menu', $data, true);

        $this->app->view('header', $data);
        $this->app->view('nav', $data);
        $this->app->view('staff/orders/index', $data);
        $this->app->view('footer');
    }
}
