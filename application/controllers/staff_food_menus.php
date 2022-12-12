<?php

class Staff_food_menus extends Controller
{
    public function __construct($app)
    {
        parent::__construct($app);
        // $this->_check_staff();
    }

    public function index()
    {
        $data = [];
        $data['title'] = 'จัดการอาหาร - ระบบสั่งอาหารออนไลน์';
        $data['active_menu'] = 'food_menus';
        $data['items'] = $this->app->staff_food_menus_lib->get_items(['no_limit' => true]);
        $data['left_menu'] = $this->app->view('staff/menu', $data, true);

        $this->app->view('header', $data);
        $this->app->view('nav', $data);
        $this->app->view('staff/food_menus/index', $data);
        $this->app->view('footer');
    }

    public function edit()
    {
        $form_data = $this->app->input_lib->post();
        $id = $this->app->input_lib->get_post('id', 0);

        // set rules for validation data
        $this->app->form_validation_lib->set_rules('title', 'อาหาร', 'required');
        $this->app->form_validation_lib->set_rules('food_category_id', 'หมวดหมู่อาหาร', 'required');
        $this->app->form_validation_lib->set_rules('price', 'ราคาอาหาร', 'required');

        // run validation
        if ($this->app->form_validation_lib->run()) {
            if ($this->app->staff_food_menus_lib->save($form_data)) {
                redirect('/staff_food_menus.php');

                return true;
            }
        }

        $data = [];
        $data['title'] = 'จัดการอาหาร - ระบบสั่งอาหารออนไลน์';
        $data['active_menu'] = 'food_menus';
        $data['item'] = $this->app->staff_food_menus_lib->get_item($id);
        $data['food_categories'] = $this->app->staff_food_category_lib->get_items(['no_limit' => true]);
        $data['left_menu'] = $this->app->view('staff/menu', $data, true);

        $this->app->view('header', $data);
        $this->app->view('nav', $data);
        $this->app->view('staff/food_menus/form', $data);
        $this->app->view('footer');
    }

    public function delete()
    {
        $id = $this->app->input_lib->get_post('id');
        $this->app->staff_food_menus_lib->delete('food_menu', $id);
        redirect('/staff_food_menus.php');
    }
}
