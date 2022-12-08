<?php

class Customer_cart_lib extends Library
{
    public function get_items()
    {
        return true;
    }

    public function delete_item($order_id = 0, $item_id = 0)
    {
        return true;
    }

    public function order($order_id = 0)
    {
        return true;
    }
}
