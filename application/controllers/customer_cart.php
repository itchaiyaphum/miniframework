<?php

class Customer_cart extends Controller
{
    public function index()
    {
        $data = [];
        $data['title'] = 'แสดงตะกร้าสินค้า - ระบบสั่งอาหารออนไลน์';
        $data['items'] = $this->app->customer_cart_lib->get_items();

        $this->app->view('header', $data);
        $this->app->view('customer/cart/index', $data);
        $this->app->view('footer');
    }

    public function delete()
    {
        $order_id = $this->app->input->get_post('id');
        $item_id = $this->app->input->get_post('item_id');

        $this->app->customer_cart_lib->delete_item($order_id, $item_id);

        redirect('/customer_cart.php?id='.$order_id);
    }

    public function order()
    {
        $order_id = $this->app->input->get_post('id');

        $this->app->customer_cart_lib->order($order_id);

        redirect('/customer_cart.php?action=order_completed&id='.$order_id);
    }

    public function order_completed()
    {
        $data = [];
        $data['title'] = 'สั่งซื้อสินค้าเรียบร้อยแล้ว - ระบบสั่งอาหารออนไลน์';

        $this->app->view('header', $data);
        $this->app->view('customer/cart/order_completed', $data);
        $this->app->view('footer');
    }
}
