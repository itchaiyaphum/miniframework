<?php

class Homepage extends Base_object
{
    public function index()
    {
        $data = [];
        $data['title'] = 'ระบบสั่งอาหารออนไลน์';

        $this->app->view('header', $data);
        $this->app->view('nav', $data);
        $this->app->view('homepage', $data);
        $this->app->view('footer');
    }
}
