<?php

class Customer_register extends Base_app
{
    public function index()
    {
        // get data from form

        // set validation rules

        // run validation

        // register data to database
        $this->app->customer_profile_lib->register();

        // redirect to completed page
        // redirect('/customer_register.php?action=register_completed');

        $data = [];
        $data['title'] = 'ลงทะเบียนสำหรับลูกค้า - ระบบสั่งอาหารออนไลน์';

        $this->app->view('header', $data);
        $this->app->view('customer/profile/register', $data);
        $this->app->view('footer');
    }

    public function register_completed()
    {
        $data = [];
        $data['title'] = 'ลงทะเบียนสำหรับลูกค้า เรียบร้อยแล้ว - ระบบสั่งอาหารออนไลน์';

        $this->app->view('header', $data);
        $this->app->view('customer/profile/register_completed', $data);
        $this->app->view('footer');
    }
}