<?php

class Staff_ordering_lib extends Library
{
    public function get_order_items()
    {
        $profile = $this->app->profile_lib->get_profile();
        $profile_id = $profile->id;

        $where = "o.restaurant_id={$profile_id}";
        $sql = "SELECT o.*
                , u.firstname as `customer_firstname` 
                , u.lastname as `customer_lastname` 
                , u.thumbnail as `customer_thumbnail` 
                FROM `order` as o
                LEFT JOIN `user` as u ON(o.restaurant_id=u.id) WHERE {$where} ORDER BY o.created_at DESC";
        $query = $this->app->database_lib->query($sql);
        $items = $query->result();

        return $items;
    }

    public function get_item($id = 0)
    {
        $where = "o.id={$id}";
        $sql = "SELECT o.*
                , u.firstname as `firstname` 
                , u.lastname as `lastname` 
                , u.mobile_no as `mobile_no` 
                , u.email as `email` 
                , u.address as `address` 
                , u.thumbnail as `thumbnail` 
                FROM `order` as o
                LEFT JOIN `user` as u ON(o.customer_id=u.id) WHERE {$where}";
        $query = $this->app->database_lib->query($sql);
        $item = $query->row();

        return $item;
    }

    public function get_invoice_food_items($id = 0)
    {
        $where = "oi.order_id IN (SELECT id FROM order WHERE id={$id})";
        $sql = "SELECT oi.*
                , fm.title as `food_name` 
                , fm.price as `food_price` 
                , fm.discount_percent as `food_discount_percent` 
                , fm.thumbnail as `food_thumbnail` 
                FROM `order_item` as oi
                LEFT JOIN `food_menu` as fm ON(oi.food_id=fm.id) WHERE {$where}";
        $query = $this->app->database_lib->query($sql);
        $items = $query->result();

        return $items;
    }

    public function get_food_items($id = 0)
    {
        $profile = $this->app->profile_lib->get_profile();
        $profile_id = $profile->id;

        $where = "oi.order_id IN(SELECT `id` FROM `order` WHERE `restaurant_id`={$profile_id})";
        $sql = "SELECT oi.*
                , fm.title as `food_name` 
                , fm.price as `food_price` 
                , fm.discount_percent as `food_discount_percent` 
                , fm.thumbnail as `food_thumbnail` 
                FROM `order_item` as oi
                LEFT JOIN `food_menu` as fm ON(oi.food_id=fm.id) WHERE {$where}";
        $query = $this->app->database_lib->query($sql);
        $items = $query->result();

        return $items;
    }

    public function accept_order($id = 0)
    {
        $data = [
            'status' => 1,
        ];
        $where = "id={$id}";

        return $this->app->database_lib->update('order', $data, $where);
    }

    public function cancel_order($id = 0)
    {
        // delete order
        $this->app->database_lib->delete('order', "id={$id}");
        // delete order item
        $this->app->database_lib->delete('order_item', "order_id={$id}");

        return true;
    }
}
