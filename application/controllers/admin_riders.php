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
        $data['title'] = 'จัดการสมาชิกทั้งหมด - ระบบสั่งอาหารออนไลน์';
        $data['active_menu'] = 'riders';
        $data['items'] = $this->app->admin_riders_lib->get_items(['limit' => 10]);
        $data['left_menu'] = $this->app->view('admin/menu', $data, true);

        $this->app->view('header', $data);
        $this->app->view('nav', $data);
        $this->app->view('admin/riders/index', $data);
        $this->app->view('footer');
    }

    public function publish()
    {
        $rider_id = $this->app->input_lib->get_post('id');
        $this->app->admin_riders_lib->publish_rider($rider_id);
        redirect('/admin_riders.php');
    }

    public function delete()
    {
        $rider_id = $this->app->input_lib->get_post('id');
        $this->app->admin_riders_lib->delete_rider($rider_id);
        redirect('/admin_riders.php');
    }
}
