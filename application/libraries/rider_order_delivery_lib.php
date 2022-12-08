<?php

class Rider_order_delivery_lib extends Library
{
    public function get_items()
    {
        return [];
    }

    public function accept_order($order_id = 0)
    {
        return true;
    }

    public function customer_detail($customer_id = 0)
    {
        return [];
    }

    public function delivery_complete($order_id = 0)
    {
        return true;
    }
}
