<?php

class Admin_restaurants extends Controller
{
    public function __construct($app)
    {
        parent::__construct($app);
        $this->_check_admin();
    }

    public function index()
    {
        $data = [];
        $data['title'] = 'จัดการร้านอาหาร - ระบบสั่งอาหารออนไลน์';
        $data['active_menu'] = 'restaurants';
        $data['items'] = $this->app->admin_restaurants_lib->get_items(['no_limit' => true]);
        $data['left_menu'] = $this->app->view('admin/menu', $data, true);

        $this->app->view('header', $data);
        $this->app->view('nav', $data);
        $this->app->view('admin/restaurants/index', $data);
        $this->app->view('footer');
    }

    public function publish()
    {
        $id = $this->app->input->get_post('id');
        $this->app->admin_restaurants_lib->publish('restaurants', $id);
        redirect('/admin_restaurants.php');
    }

    public function trash()
    {
        $id = $this->app->input->get_post('id');
        $this->app->admin_restaurants_lib->trash('restaurants', $id);
        redirect('/admin_restaurants.php');
    }
}
