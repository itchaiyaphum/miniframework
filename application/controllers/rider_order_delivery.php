<?php

class Rider_order_delivery extends Base_app
{
    public function index()
    {
        $data = [];
        $data['title'] = 'รายการอาหารที่รอจัดส่ง - ระบบสั่งอาหารออนไลน์';
        $data['items'] = $this->app->rider_order_delivery_lib->get_items();

        $this->app->view('header', $data);
        $this->app->view('nav', $data);
        $this->app->view('rider/order_delivery/index', $data);
        $this->app->view('footer');
    }

    public function accept_order()
    {
        $order_id = $this->app->input->get_post('order_id');

        $this->app->rider_order_delivery_lib->accept_order($order_id);

        redirect('/rider_order_delivery.php');
    }

    public function customer_detail()
    {
        $customer_id = $this->app->input->get_post('customer_id');

        $data = [];
        $data['title'] = 'รายละเอียดลูกค้า - ระบบสั่งอาหารออนไลน์';
        $data['customer_detail'] = $this->app->rider_order_delivery_lib->customer_detail($customer_id);

        $this->app->view('header', $data);
        $this->app->view('nav', $data);
        $this->app->view('rider/order_delivery/customer_detail', $data);
        $this->app->view('footer');
    }

    public function delivery_complete()
    {
        $order_id = $this->app->input->get_post('order_id');

        $this->app->rider_order_delivery_lib->delivery_complete($order_id);

        redirect('/rider_order_delivery.php');
    }
}
