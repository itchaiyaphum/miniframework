<?php

class Customer_food_review extends Controller
{
    public function index()
    {
        // get data form form
        $order_id = $this->app->input_lib->get_post('id');
        $review_data = $this->app->input_lib->post();

        // set rules for validation data
        $this->app->form_validation_lib->set_rules('detail', 'กรอกความคิดเห็น', 'required');

        // run validation
        if ($this->app->form_validation_lib->run()) {
            if ($this->app->customer_food_review_lib->review($review_data)) {
                redirect('/customer_history_order.php');
            }
        }

        $data = [];
        $data['title'] = 'รีวิวอาหาร - ระบบสั่งอาหารออนไลน์';
        $data['order_id'] = $order_id;
        $data['order_items'] = $this->app->customer_food_review_lib->get_order_items($order_id);
        $data['food_items'] = $this->app->customer_food_review_lib->get_food_items($order_id);
        $data['active_menu'] = 'history_order';
        $data['left_menu'] = $this->app->view('customer/menu', $data, true);

        $this->app->view('header', $data);
        $this->app->view('nav', $data);
        $this->app->view('customer/food_review/index', $data);
        $this->app->view('footer');
    }
}
