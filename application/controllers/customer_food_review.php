<?php

class Customer_food_review extends Controller
{
    public function index()
    {
        // get data form form
        // $order_id = $this->app->input_lib->get_post('order_id');

        // set validation rules

        // run validation

        // save data to database
        // $this->app->customer_food_review_lib->review($order_id);

        // redirect
        // redirect('/customer_history_order.php');

        $data = [];
        $data['title'] = 'รีวิวอาหาร - ระบบสั่งอาหารออนไลน์';
        $data['item'] = $this->app->customer_food_review_lib->get_item();
        $data['active_menu'] = 'history_order';
        $data['left_menu'] = $this->app->view('customer/menu', $data, true);

        $this->app->view('header', $data);
        $this->app->view('nav', $data);
        $this->app->view('customer/food_review/index', $data);
        $this->app->view('footer');
    }
}
