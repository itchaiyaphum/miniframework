<?php

class Staff_reporting extends Controller
{
    public function index()
    {
        $data = [];
        $data['title'] = 'รายงานยอดขาย - ระบบสั่งอาหารออนไลน์';
        $data['items'] = $this->app->staff_reporting_lib->get_items();
        $data['active_menu'] = 'reporting';
        $data['left_menu'] = $this->app->view('staff/menu', $data, true);

        $this->app->view('header', $data);
        $this->app->view('staff/reporting/index', $data);
        $this->app->view('footer');
    }
}
