<?php

class Staff_food_category extends Controller
{
    public function __construct($app)
    {
        parent::__construct($app);
        $this->_check_staff();
    }

    public function index()
    {
        $data = [];
        $data['title'] = 'หมวดหมู่อาหาร - ระบบสั่งอาหารออนไลน์';
        $data['active_menu'] = 'food_category';
        $data['left_menu'] = $this->app->view('staff/menu', $data, true);

        $this->app->view('header', $data);
        $this->app->view('nav', $data);
        $this->app->view('staff/food_category/index', $data);
        $this->app->view('footer');
    }

    public function add()
    {
        $this->app->staff_food_category_lib->add_category();

        redirect('/staff_food_category.php');
    }

    public function edit()
    {
        $data = [];
        $data['title'] = 'หมวดหมู่อาหาร - ระบบสั่งอาหารออนไลน์';
        $data['active_menu'] = 'food_category';
        $data['left_menu'] = $this->app->view('staff/menu', $data, true);
        $data['item'] = $this->app->staff_food_category_lib->get_item();

        $this->app->view('header', $data);
        $this->app->view('nav', $data);
        $this->app->view('staff/food_category/form', $data);
        $this->app->view('footer');
    }

    public function delete()
    {
        $this->app->staff_food_category_lib->delete_category();

        redirect('/staff_food_category.php');
    }
}
