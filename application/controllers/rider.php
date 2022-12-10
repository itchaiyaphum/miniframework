<?php

class Rider extends Controller
{
    public function __construct($app)
    {
        parent::__construct($app);
        $this->_check_rider();
    }

    public function index()
    {
        $data = [];
        $data['title'] = 'สำหรับผู้ส่งอาหาร (rider) - ระบบสั่งอาหารออนไลน์';
        $data['active_menu'] = 'index';
        $data['left_menu'] = $this->app->view('rider/menu', $data, true);

        $this->app->view('header', $data);
        $this->app->view('nav', $data);
        $this->app->view('rider/index', $data);
        $this->app->view('footer');
    }
}
