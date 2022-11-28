<?php

class Staff extends Controller
{
    public function __construct($app)
    {
        parent::__construct($app);
        $this->_check_staff();
    }

    public function index()
    {
        $data = [];
        $data['title'] = 'สำหรับผู้ดูแลร้านอาหาร (staff) - ระบบสั่งอาหารออนไลน์';
        $data['active_menu'] = 'index';
        $data['left_menu'] = $this->app->view('staff/menu', $data, true);

        $this->app->view('header', $data);
        $this->app->view('nav', $data);
        $this->app->view('staff/index', $data);
        $this->app->view('footer');
    }
}
