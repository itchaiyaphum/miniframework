<?php

class Staff_register extends Base_app
{
    public function index()
    {
        // get data from form

        // set validation rules

        // run validation

        // register data to database
        $this->app->staff_profile_lib->register();

        // redirect to completed page
        // redirect('/staff_register.php?action=register_completed');

        $data = [];
        $data['title'] = 'ลงทะเบียนสำหรับผู้ดูแลร้านอาหาร - ระบบสั่งอาหารออนไลน์';

        $this->app->view('header', $data);
        $this->app->view('staff/profile/register', $data);
        $this->app->view('footer');
    }

    public function register_completed()
    {
        $data = [];
        $data['title'] = 'ลงทะเบียนสำหรับผู้ดูแลร้านอาหาร เรียบร้อยแล้ว - ระบบสั่งอาหารออนไลน์';

        $this->app->view('header', $data);
        $this->app->view('staff/profile/register_completed', $data);
        $this->app->view('footer');
    }
}
