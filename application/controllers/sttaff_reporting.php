<?php

class Staff_reporting extends Controller
{
    public function index()
    {
        // check is login

        $data = [];
        $data['title'] = 'รายงานยอดขาย - ระบบสั่งอาหารออนไลน์';
        $data['items'] = $this->app->staff_reporting_lib->get_items();

        $this->app->view('header', $data);
        $this->app->view('staff/profile/profile', $data);
        $this->app->view('footer');
    }
}
