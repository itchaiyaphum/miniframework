<?php

class Customer_restaurants extends Controller
{
    public function index()
    {
        $data = [];
        $data['title'] = 'แสดงร้านอาหารทั้งหมด - ระบบสั่งอาหารออนไลน์';
        $data['restaurants'] = $this->app->customer_restaurants_lib->get_items();

        $this->app->view('header', $data);
        $this->app->view('customer/restaurants/index', $data);
        $this->app->view('footer');
    }

    public function detail()
    {
        $data = [];
        $data['title'] = 'รายละเอียดร้านอาหาร - ระบบสั่งอาหารออนไลน์';
        $data['restaurant'] = $this->app->customer_restaurants_lib->get_item();
        $data['food_categories'] = $this->app->customer_restaurants_lib->get_food_categories();
        $data['food_menus'] = $this->app->customer_restaurants_lib->get_food_menus();
        $data['reviews'] = $this->app->customer_restaurants_lib->get_reviews();

        $this->app->view('header', $data);
        $this->app->view('customer/restaurants/detail', $data);
        $this->app->view('footer');
    }

    public function add_to_cart()
    {
        redirect('/customer_restaurants.php?action=detail');
    }
}
