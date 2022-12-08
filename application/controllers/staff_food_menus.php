<?php

class Staff_food_menus extends Controller
{
    public function __construct($app)
    {
        parent::__construct($app);
        $this->_check_staff();
    }

    public function index()
    {
        $data = [];
        $data['title'] = 'เมนูอาหาร - ระบบสั่งอาหารออนไลน์';
        $data['active_menu'] = 'food_menus';
        $data['left_menu'] = $this->app->view('staff/menu', $data, true);

        $this->app->view('header', $data);
        $this->app->view('nav', $data);
        $this->app->view('staff/food_menus/index', $data);
        $this->app->view('footer');
    }

    public function add()
    {
        $this->app->staff_food_menus_lib->add_menu();

        redirect('/staff_food_menus.php');
    }

    public function edit()
    {
        $data = [];
        $data['title'] = 'เมนูอาหาร - ระบบสั่งอาหารออนไลน์';
        $data['active_menu'] = 'food_menus';
        $data['left_menu'] = $this->app->view('staff/menu', $data, true);
        $data['item'] = $this->app->staff_food_menus_lib->get_item();

        $this->app->view('header', $data);
        $this->app->view('nav', $data);
        $this->app->view('staff/food_menus/form', $data);
        $this->app->view('footer');
    }

    public function delete()
    {
        $this->app->staff_food_menus_lib->delete_menu();

        redirect('/staff_food_menus.php');
    }
}
