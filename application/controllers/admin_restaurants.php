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

    public function edit()
    {
        $form_data = $this->app->input->post();
        $id = $this->app->input->get_post('id');

        // set rules for validation data
        $this->app->form_validation->set_rules('title', 'ร้านอาหาร', 'required');

        // run validation
        if ($this->app->form_validation->run()) {
            $this->app->admin_restaurants_lib->save($form_data);
            redirect('/admin_restaurants.php');
        }

        $data = [];
        $data['title'] = 'จัดการร้านอาหาร [แก้ไข] - ระบบสั่งอาหารออนไลน์';
        $data['active_menu'] = 'restaurants';
        $data['item'] = $this->app->admin_restaurants_lib->get_item($id);
        $data['left_menu'] = $this->app->view('admin/menu', $data, true);

        $this->app->view('header', $data);
        $this->app->view('nav', $data);
        $this->app->view('admin/restaurants/form', $data);
        $this->app->view('footer');
    }

    public function publish()
    {
        $id = $this->app->input->get_post('id');
        $this->app->admin_restaurants_lib->publish('restaurants', $id);
        redirect('/admin_restaurants.php');
    }

    public function unpublish()
    {
        $id = $this->app->input->get_post('id');
        $this->app->admin_restaurants_lib->unpublish('restaurants', $id);
        redirect('/admin_restaurants.php');
    }

    public function trash()
    {
        $id = $this->app->input->get_post('id');
        $this->app->admin_restaurants_lib->trash('restaurants', $id);
        redirect('/admin_restaurants.php');
    }

    public function restore()
    {
        $id = $this->app->input->get_post('id');
        $this->app->admin_restaurants_lib->restore('restaurants', $id);
        redirect('/admin_restaurants.php');
    }

    public function delete()
    {
        $id = $this->app->input->get_post('id');
        $this->app->admin_restaurants_lib->delete('restaurants', $id);
        redirect('/admin_restaurants.php');
    }
}
