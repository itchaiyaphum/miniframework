<?php

class Customer_profile extends Controller
{
    public function index()
    {
        // check is login

        // get data from form

        // set validation rules

        // run validation

        // save profile data to database
        $this->app->customer_profile_lib->save();

        $data = [];
        $data['title'] = 'แก้ไขข้อมูลส่วนตัว - ระบบสั่งอาหารออนไลน์';

        $this->app->view('header', $data);
        $this->app->view('customer/profile/profile', $data);
        $this->app->view('footer');
    }
}
