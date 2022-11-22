<?php

class Homepage extends Base_object
{
    public function index()
    {
        $users = $this->app->library('users_lib');
        $users_items = $users->get_items();

        $data = [];
        $data['users_items'] = $users_items;

        $this->app->view('header');
        $this->app->view('homepage', $data);
        $this->app->view('footer');
    }
}
