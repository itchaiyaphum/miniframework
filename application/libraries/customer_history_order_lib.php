<?php

class Customer_history_order_lib extends Library
{
    public function get_order_items()
    {
        $profile = $this->app->profile_lib->get_profile();
        $profile_id = $profile->id;

        $where = "o.customer_id={$profile_id}";
        $sql = "SELECT o.*
                , u.restaurant_name as `restaurant_name` 
                , u.thumbnail as `restaurant_thumbnail` 
                FROM `order` as o
                LEFT JOIN `user` as u ON(o.customer_id=u.id) WHERE {$where} ORDER BY o.created_at DESC";
        $query = $this->app->database_lib->query($sql);
        $items = $query->result();

        return $items;
    }

    public function get_food_items()
    {
        $profile = $this->app->profile_lib->get_profile();
        $profile_id = $profile->id;

        $where = "oi.order_id IN(SELECT `id` FROM `order` WHERE `customer_id`={$profile_id})";
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
}
