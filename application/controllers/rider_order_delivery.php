<?php

class Rider_order_delivery extends Controller
{
    public function index()
    {
        $data = [];
        $data['title'] = 'รายการอาหารที่รอจัดส่ง - ระบบสั่งอาหารออนไลน์';
        $data['items'] = $this->app->rider_order_delivery_lib->get_items();
        $data['active_menu'] = 'order_delivery';
        $data['left_menu'] = $this->app->view('rider/menu', $data, true);

        $this->app->view('header', $data);
        $this->app->view('nav', $data);
        $this->app->view('rider/order_delivery/index', $data);
        $this->app->view('footer');
    }

    public function accept_order()
    {
        $order_id = $this->app->input_lib->get_post('order_id');

        $this->app->rider_order_delivery_lib->accept_order($order_id);

        redirect('/rider_history_delivery.php');
    }
}
