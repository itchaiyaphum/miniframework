<?php

class Staff_food_menus extends Controller
{
    public function __construct($app)
    {
        parent::__construct($app);
        $this->_check_staff();
    }

    public function index()
    {
        $data = [];
        $data['title'] = 'เมนูอาหาร - ระบบสั่งอาหารออนไลน์';
        $data['active_menu'] = 'food_menus';
        $data['left_menu'] = $this->app->view('staff/menu', $data, true);

        $this->app->view('header', $data);
        $this->app->view('nav', $data);
        $this->app->view('staff/food_menus/index', $data);
        $this->app->view('footer');
    }
}
