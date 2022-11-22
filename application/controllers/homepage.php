<?php

class Homepage extends Base_object
{
    public function index()
    {
        $users = $this->app->library('users_lib');
        $users_items = $users->get_items();

        $data = [];
        $data['title'] = 'ระบบสั่งอาหารออนไลน์';
        $data['users_items'] = $users_items;

        $this->app->view('header', $data);
        $this->app->view('nav', $data);
        $this->app->view('homepage', $data);
        $this->app->view('footer');
    }
}
