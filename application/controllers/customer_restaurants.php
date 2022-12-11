<?php

class Customer_restaurants extends Controller
{
    public function index()
    {
        $data = [];
        $data['title'] = 'แสดงร้านอาหารทั้งหมด - ระบบสั่งอาหารออนไลน์';
        $data['active_menu'] = 'restaurants';
        $data['items'] = $this->app->customer_restaurants_lib->get_items(['no_limit' => true]);
        $data['left_menu'] = $this->app->view('customer/menu', $data, true);

        $this->app->view('header', $data);
        $this->app->view('nav', $data);
        $this->app->view('customer/restaurants/index', $data);
        $this->app->view('footer');
    }

    public function detail()
    {
        $id = $this->app->input_lib->get_post('id', 0);
        $cate_id = $this->app->input_lib->get_post('cate_id', 0);

        $data = [];
        $data['title'] = 'รายละเอียดร้านอาหาร - ระบบสั่งอาหารออนไลน์';
        $data['active_menu'] = 'restaurants';
        $data['cate_id'] = $cate_id;
        $data['item'] = $this->app->customer_restaurants_lib->get_item($id);
        $data['food_categories'] = $this->app->customer_restaurants_lib->get_food_categories();
        $data['food_menus'] = $this->app->customer_restaurants_lib->get_food_menus($id, $cate_id);
        $data['reviews'] = $this->app->customer_restaurants_lib->get_reviews();
        $data['left_menu'] = $this->app->view('customer/menu', $data, true);

        $this->app->view('header', $data);
        $this->app->view('nav', $data);
        $this->app->view('customer/restaurants/detail', $data);
        $this->app->view('footer');
    }

    public function add_to_cart()
    {
        $id = $this->app->input_lib->get_post('id', 0);
        $cate_id = $this->app->input_lib->get_post('cate_id', 0);
        $food_id = $this->app->input_lib->get_post('food_id', 0);

        $this->app->customer_cart_lib->add_to_cart($id, $food_id);

        redirect("/customer_restaurants.php?action=detail&id={$id}&cate_id={$cate_id}&msg_status=addtocart_ok");
    }
}
