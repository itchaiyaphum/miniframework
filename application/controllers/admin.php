<?php

class Admin extends Controller
{
    public function __construct($app)
    {
        parent::__construct($app);
        // $this->_check_admin();
    }

    public function index()
    {
        $data = [];
        $data['title'] = 'ระบบบริหารจัดการหลังบ้าน - ระบบสั่งอาหารออนไลน์';
        $data['active_menu'] = 'index';
        $data['left_menu'] = $this->app->view('admin/menu', $data, true);

        $this->app->view('header', $data);
        $this->app->view('nav', $data);
        $this->app->view('admin/index', $data);
        $this->app->view('footer');
    }

    public function restaurant_types()
    {
        $data = [];
        $data['title'] = 'จัดการประเภทร้านอาหาร - ระบบสั่งอาหารออนไลน์';
        $data['active_menu'] = 'restaurant_types';
        $data['left_menu'] = $this->app->view('admin/menu', $data, true);

        $this->app->view('header', $data);
        $this->app->view('nav', $data);
        $this->app->view('admin/restaurant_types', $data);
        $this->app->view('footer');
    }

    public function restaurants()
    {
        $data = [];
        $data['title'] = 'จัดการร้านอาหาร - ระบบสั่งอาหารออนไลน์';
        $data['active_menu'] = 'restaurants';
        $data['left_menu'] = $this->app->view('admin/menu', $data, true);

        $this->app->view('header', $data);
        $this->app->view('nav', $data);
        $this->app->view('admin/restaurants', $data);
        $this->app->view('footer');
    }
}
