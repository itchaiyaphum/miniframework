<?php

class Staff_ordering extends Controller
{
    public function index()
    {
        $data = [];
        $data['title'] = 'รายการสั่งซื้ออาหาร - ระบบสั่งอาหารออนไลน์';
        $data['order_items'] = $this->app->staff_ordering_lib->get_order_items();
        $data['food_items'] = $this->app->staff_ordering_lib->get_food_items();
        $data['active_menu'] = 'ordering';
        $data['left_menu'] = $this->app->view('staff/menu', $data, true);

        $this->app->view('header', $data);
        $this->app->view('nav', $data);
        $this->app->view('staff/ordering/index', $data);
        $this->app->view('footer');
    }

    public function accept()
    {
        $id = $this->app->input_lib->get('id', 0);
        $this->app->staff_ordering_lib->accept_order($id);
        redirect('/staff_ordering.php');
    }

    public function cancel()
    {
        $id = $this->app->input_lib->get('id', 0);
        $this->app->staff_ordering_lib->cancel_order($id);
        redirect('/staff_ordering.php');
    }

    public function invoice()
    {
        $id = $this->app->input_lib->get('id', 0);

        $data = [];
        $data['title'] = 'ใบเสร็จรับเงิน - ระบบสั่งอาหารออนไลน์';
        $data['profile'] = $this->app->profile_lib->get_profile();
        $data['item'] = $this->app->staff_ordering_lib->get_item($id);
        $data['food_items'] = $this->app->staff_ordering_lib->get_invoice_food_items($id);

        $this->app->view('header', $data);
        $this->app->view('staff/ordering/invoice', $data);
        $this->app->view('footer_print');
    }
}
