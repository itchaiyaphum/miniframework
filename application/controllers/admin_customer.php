<?php

class Admin_customer extends Controller
{
    public function __construct($app)
    {
        parent::__construct($app);
        // $this->_check_admin();
    }

    public function index()
    {
        $data = [];
        $data['title'] = 'จัดการลูกค้า - ระบบสั่งอาหารออนไลน์';
        $data['active_menu'] = 'customer';
        $data['items'] = $this->app->admin_customer_lib->get_items();
        $data['left_menu'] = $this->app->view('admin/menu', $data, true);

        $this->app->view('header', $data);
        $this->app->view('nav', $data);
        $this->app->view('admin/customer/index', $data);
        $this->app->view('footer');
    }

    public function approve()
    {
        $id = $this->app->input_lib->get_post('id');
        $this->app->admin_customer_lib->publish('users', $id);
        redirect('/admin_customer.php');
    }

    public function cancel()
    {
        $id = $this->app->input_lib->get_post('id');
        $this->app->admin_customer_lib->unpublish('users', $id);
        redirect('/admin_customer.php');
    }
}
