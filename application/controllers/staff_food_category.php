<?php

class Staff_food_category extends Controller
{
    public function __construct($app)
    {
        parent::__construct($app);
        // $this->_check_staff();
    }

    public function index()
    {
        $data = [];
        $data['title'] = 'หมวดหมู่อาหาร - ระบบสั่งอาหารออนไลน์';
        $data['active_menu'] = 'food_category';
        $data['items'] = $this->app->staff_food_category_lib->get_items(['no_limit' => true]);
        $data['left_menu'] = $this->app->view('staff/menu', $data, true);

        $this->app->view('header', $data);
        $this->app->view('nav', $data);
        $this->app->view('staff/food_category/index', $data);
        $this->app->view('footer');
    }

    public function edit()
    {
        $form_data = $this->app->input_lib->post();
        $id = $this->app->input_lib->get_post('id', 0);

        // set rules for validation data
        $this->app->form_validation_lib->set_rules('title', 'ประเภทร้านอาหาร', 'required');

        // run validation
        if ($this->app->form_validation_lib->run()) {
            $this->app->staff_food_category_lib->save($form_data);
            redirect('/staff_food_category.php');
        }

        $data = [];
        $data['title'] = 'จัดการหมวดหมู่อาหาร - ระบบสั่งอาหารออนไลน์';
        $data['active_menu'] = 'food_category';
        $data['item'] = $this->app->staff_food_category_lib->get_item($id);
        $data['left_menu'] = $this->app->view('staff/menu', $data, true);

        $this->app->view('header', $data);
        $this->app->view('nav', $data);
        $this->app->view('staff/food_category/form', $data);
        $this->app->view('footer');
    }

    public function delete()
    {
        $id = $this->app->input_lib->get_post('id');
        $this->app->staff_food_category_lib->delete('food_category', $id);
        redirect('/staff_food_category.php');
    }
}
