<?php

class Rider_order_delivery extends Controller
{
    public function index()
    {
        $restaurant_id = $this->app->input_lib->get_post('restaurant_id', 0);

        $data = [];
        $data['title'] = 'รายการอาหารที่รอจัดส่ง - ระบบสั่งอาหารออนไลน์';
        $data['restaurants'] = $this->app->rider_order_delivery_lib->get_restaurant_items();
        $data['order_items'] = $this->app->rider_order_delivery_lib->get_order_items();
        $data['food_items'] = $this->app->rider_order_delivery_lib->get_food_items();
        $data['restaurant_id'] = $restaurant_id;
        $data['active_menu'] = 'order_delivery';
        $data['left_menu'] = $this->app->view('rider/menu', $data, true);

        $this->app->view('header', $data);
        $this->app->view('nav', $data);
        $this->app->view('rider/order_delivery/index', $data);
        $this->app->view('footer');
    }

    public function accept_order()
    {
        $order_id = $this->app->input_lib->get_post('id');

        $this->app->rider_order_delivery_lib->accept_order($order_id);

        redirect('/rider_history_delivery.php');
    }
}
