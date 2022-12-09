<?php

class Customer_history_order extends Controller
{
    public function index()
    {
        $data = [];
        $data['title'] = 'ประวัติการสั่งซื้ออาหาร - ระบบสั่งอาหารออนไลน์';
        $data['items'] = $this->app->customer_cart_lib->get_items();
        $data['active_menu'] = 'history_order';
        $data['left_menu'] = $this->app->view('customer/menu', $data, true);

        $this->app->view('header', $data);
        $this->app->view('nav', $data);
        $this->app->view('customer/history_order/index', $data);
        $this->app->view('footer');
    }
}
