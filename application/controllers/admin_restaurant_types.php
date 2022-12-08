<?php

class Admin_restaurant_types extends Controller
{
    public function __construct($app)
    {
        parent::__construct($app);
        $this->_check_admin();
    }

    public function index()
    {
        $data = [];
        $data['title'] = 'จัดการประเภทร้านอาหาร - ระบบสั่งอาหารออนไลน์';
        $data['active_menu'] = 'restaurant_types';
        $data['items'] = $this->app->admin_restaurant_types_lib->get_items(['no_limit' => true]);
        $data['left_menu'] = $this->app->view('admin/menu', $data, true);

        $this->app->view('header', $data);
        $this->app->view('nav', $data);
        $this->app->view('admin/restaurant_types/index', $data);
        $this->app->view('footer');
    }

    public function edit()
    {
        $form_data = $this->app->input->post();
        $id = $this->app->input->get_post('id', 0);

        // set rules for validation data
        $this->app->form_validation->set_rules('title', 'ประเภทร้านอาหาร', 'required');

        // run validation
        if ($this->app->form_validation->run()) {
            $this->app->admin_restaurant_types_lib->save($form_data);
            redirect('/admin_restaurant_types.php');
        }

        $data = [];
        $data['title'] = 'จัดการปรเภทร้านอาหาร [แก้ไข] - ระบบสั่งอาหารออนไลน์';
        $data['active_menu'] = 'restaurant_types';
        $data['item'] = $this->app->admin_restaurant_types_lib->get_item($id);
        $data['left_menu'] = $this->app->view('admin/menu', $data, true);

        $this->app->view('header', $data);
        $this->app->view('nav', $data);
        $this->app->view('admin/restaurant_types/form', $data);
        $this->app->view('footer');
    }

    public function delete()
    {
        $id = $this->app->input->get_post('id');
        $this->app->admin_restaurant_types_lib->delete('restaurant_types', $id);
        redirect('/admin_restaurant_types.php');
    }
}
