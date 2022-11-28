<?php

class Staff_food_reports extends Controller
{
    public function __construct($app)
    {
        parent::__construct($app);
        $this->_check_staff();
    }

    public function index()
    {
        $data = [];
        $data['title'] = 'รายงานการขาย - ระบบสั่งอาหารออนไลน์';
        $data['active_menu'] = 'food_reports';
        $data['left_menu'] = $this->app->view('staff/menu', $data, true);

        $this->app->view('header', $data);
        $this->app->view('nav', $data);
        $this->app->view('staff/food_reports/index', $data);
        $this->app->view('footer');
    }
}
