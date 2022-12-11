<?php

class Admin_riders extends Controller
{
    public function __construct($app)
    {
        parent::__construct($app);
        // $this->_check_admin();
    }

    public function index()
    {
        $data = [];
        $data['title'] = 'จัดการผู้ส่งอาหาร - ระบบสั่งอาหารออนไลน์';
        $data['active_menu'] = 'riders';
        $data['items'] = $this->app->admin_riders_lib->get_items();
        $data['left_menu'] = $this->app->view('admin/menu', $data, true);

        $this->app->view('header', $data);
        $this->app->view('nav', $data);
        $this->app->view('admin/riders/index', $data);
        $this->app->view('footer');
    }

    public function approve()
    {
        $id = $this->app->input_lib->get_post('id');
        $this->app->admin_riders_lib->publish('users', $id);
        redirect('/admin_riders.php');
    }

    public function cancel()
    {
        $id = $this->app->input_lib->get_post('id');
        $this->app->admin_riders_lib->unpublish('users', $id);
        redirect('/admin_riders.php');
    }
}
