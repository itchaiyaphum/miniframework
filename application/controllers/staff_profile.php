<?php

class Staff_profile extends Controller
{
    public function index()
    {
        // check is login

        // get data from form

        // set validation rules

        // run validation

        // save profile data to database
        $this->app->staff_profile_lib->save();

        $data = [];
        $data['title'] = 'แก้ไขข้อมูลส่วนตัว - ระบบสั่งอาหารออนไลน์';

        $this->app->view('header', $data);
        $this->app->view('nav', $data);
        $this->app->view('staff/profile/profile', $data);
        $this->app->view('footer');
    }
}
