<?php

class Customer_food_review extends Controller
{
    public function index()
    {
        $data = [];
        $data['title'] = 'รีวิวอาหาร - ระบบสั่งอาหารออนไลน์';
        $data['item'] = $this->app->customer_food_review_lib->get_item();

        $this->app->view('header', $data);
        $this->app->view('customer/food_review/index', $data);
        $this->app->view('footer');
    }

    public function review()
    {
        $order_id = $this->app->input->get_post('order_id');

        $this->app->customer_food_review_lib->review($order_id);

        redirect('/customer_history_order.php');
    }
}
