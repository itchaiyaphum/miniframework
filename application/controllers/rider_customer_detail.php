<?php

class Rider_customer_detail extends Controller
{
    public function index()
    {
        $id = $this->app->input_lib->get_post('id');

        $data = [];
        $data['title'] = 'รายละเอียดลูกค้า - ระบบสั่งอาหารออนไลน์';
        $data['customer_detail'] = $this->app->profile_lib->get_profile_by_id($id);
        $data['active_menu'] = 'order_delivery';
        $data['left_menu'] = $this->app->view('rider/menu', $data, true);

        $this->app->view('header', $data);
        $this->app->view('nav', $data);
        $this->app->view('rider/customer_detail/index', $data);
        $this->app->view('footer');
    }
}
