<?php

class Rider_history_delivery_lib extends Library
{
    public function get_order_items()
    {
        $profile = $this->app->profile_lib->get_profile();
        $profile_id = $profile->id;

        $where = "o.rider_id={$profile_id}";
        $sql = "SELECT o.*
                , u.restaurant_name as `restaurant_name` 
                , u.thumbnail as `restaurant_thumbnail` 
                FROM `orders` as o
                LEFT JOIN `users` as u ON(o.rider_id=u.id) WHERE {$where} ORDER BY o.created_at DESC";
        $query = $this->app->database_lib->query($sql);
        $items = $query->result();

        return $items;
    }

    public function get_food_items()
    {
        $profile = $this->app->profile_lib->get_profile();
        $profile_id = $profile->id;

        $where = "oi.order_id IN(SELECT `id` FROM `orders` WHERE `rider_id`={$profile_id})";
        $sql = "SELECT oi.*
                , fm.title as `food_name` 
                , fm.price as `food_price` 
                , fm.discount_percent as `food_discount_percent` 
                , fm.thumbnail as `food_thumbnail` 
                FROM `orders_items` as oi
                LEFT JOIN `food_menus` as fm ON(oi.food_id=fm.id) WHERE {$where}";
        $query = $this->app->database_lib->query($sql);
        $items = $query->result();

        return $items;
    }

    public function delivery_complete($id = 0)
    {
        // เตรียมข้อมูลก่อนจะบันทึกลง database
        $data = [
            'status' => 3,
            'updated_at' => now(),
        ];
        $where = "id={$id}";

        // บันทึกข้อมูลลงใน database
        return $this->app->database_lib->update('orders', $data, $where);
    }
}
