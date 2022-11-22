<?php

class Homepage
{
    public function index()
    {
        $users = $this->app->load->library('users_lib');
        $users->get_items();

        $this->app->load->view('header');
        $this->app->load->view('homepage');
        $this->app->load->view('footer');
    }
}
