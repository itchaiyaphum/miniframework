<?php

class Staff_ordering extends Controller
{
    public function index()
    {
        $data = [];
        $data['title'] = 'รายการสั่งซื้ออาหาร - ระบบสั่งอาหารออนไลน์';
        $data['items'] = $this->app->staff_ordering_lib->get_items();

        $this->app->view('header', $data);
        $this->app->view('staff/ordering/index', $data);
        $this->app->view('footer');
    }

    public function accept()
    {
        redirect('/staff_ordering.php');
    }

    public function cancel()
    {
        redirect('/staff_ordering.php');
    }

    public function invoice()
    {
        $data = [];
        $data['title'] = 'ใบเสร็จรับเงิน - ระบบสั่งอาหารออนไลน์';
        $data['item'] = $this->app->staff_ordering_lib->get_item();

        $this->app->view('header', $data);
        $this->app->view('staff/ordering/invoice', $data);
        $this->app->view('footer');
    }
}
