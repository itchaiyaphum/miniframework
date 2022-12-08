<?php

class Rider_register extends Base_app
{
    public function index()
    {
        // get data from form

        // set validation rules

        // run validation

        // register data to database
        $this->app->rider_profile_lib->register();

        // redirect to completed page
        // redirect('/rider_register.php?action=register_completed');

        $data = [];
        $data['title'] = 'ลงทะเบียนสำหรับผู้ส่งอาหาร - ระบบสั่งอาหารออนไลน์';

        $this->app->view('header', $data);
        $this->app->view('rider/profile/register', $data);
        $this->app->view('footer');
    }

    public function register_completed()
    {
        $data = [];
        $data['title'] = 'ลงทะเบียนสำหรับผู้ส่งอาหาร เรียบร้อยแล้ว - ระบบสั่งอาหารออนไลน์';

        $this->app->view('header', $data);
        $this->app->view('rider/profile/register_completed', $data);
        $this->app->view('footer');
    }
}
