<?php

class Rider_history_delivery extends Controller
{
    public function index()
    {
        $data = [];
        $data['title'] = 'ประวัติการส่งอาหาร - ระบบสั่งอาหารออนไลน์';
        $data['order_items'] = $this->app->rider_history_delivery_lib->get_order_items();
        $data['food_items'] = $this->app->rider_history_delivery_lib->get_food_items();
        $data['active_menu'] = 'history_delivery';
        $data['left_menu'] = $this->app->view('rider/menu', $data, true);

        $this->app->view('header', $data);
        $this->app->view('nav', $data);
        $this->app->view('rider/history_delivery/index', $data);
        $this->app->view('footer');
    }

    public function delivery_complete()
    {
        $order_id = $this->app->input_lib->get_post('id');

        $this->app->rider_history_delivery_lib->delivery_complete($order_id);

        redirect('/rider_history_delivery.php');
    }
}
