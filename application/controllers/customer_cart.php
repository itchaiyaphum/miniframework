<?php

class Customer_cart extends Controller
{
    public function index()
    {
        $data = [];
        $data['title'] = 'แสดงตะกร้าสินค้า - ระบบสั่งอาหารออนไลน์';
        $data['items'] = $this->app->customer_cart_lib->get_items();
        $data['active_menu'] = 'cart';
        $data['multiple_restaurant'] = $this->app->customer_cart_lib->is_multiple_restaurant_order();
        $data['left_menu'] = $this->app->view('customer/menu', $data, true);
        $data['profile'] = $this->app->profile_lib->get_profile();

        $this->app->view('header', $data);
        $this->app->view('nav', $data);
        $this->app->view('customer/cart/index', $data);
        $this->app->view('footer');
    }

    // สั่งซื้ออาหาร
    public function order()
    {
        if ($this->app->customer_cart_lib->order()) {
            redirect('/customer_cart.php?action=order_completed');

            return true;
        }
        redirect('/customer_cart.php');
    }

    // สั่งซื้ออาหารเรียบร้อย
    public function order_completed()
    {
        $data = [];
        $data['title'] = 'สั่งซื้อสินค้าเรียบร้อยแล้ว - ระบบสั่งอาหารออนไลน์';

        $this->app->view('header', $data);
        $this->app->view('customer/cart/order_completed', $data);
        $this->app->view('footer');
    }

    // ลบรายการอาหารในตระกร้าสินค้า
    public function delete()
    {
        $id = $this->app->input_lib->get_post('id');
        $this->app->customer_cart_lib->delete('cart', $id);
        redirect('/customer_cart.php');
    }
}
