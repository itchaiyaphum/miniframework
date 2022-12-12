<?php

class Rider_order_delivery_lib extends Library
{
    public function get_restaurant_items()
    {
        $sql = "SELECT * FROM user WHERE user_type='staff' AND status=1 ";
        $query = $this->app->database_lib->query($sql);
        $items = $query->result();

        return $items;
    }

    public function get_order_items()
    {
        $restaurant_id = $this->app->input_lib->get_post('restaurant_id', 0);

        $where = 'o.status=1';
        if ($restaurant_id != 0) {
            $where = "o.status=1 AND o.restaurant_id={$restaurant_id}";
        }
        $sql = "SELECT o.*
                , u.restaurant_name as `restaurant_name` 
                , u.thumbnail as `restaurant_thumbnail` 
                FROM `order` as o
                LEFT JOIN `user` as u ON(o.restaurant_id=u.id) WHERE {$where} ORDER BY o.created_at DESC";
        $query = $this->app->database_lib->query($sql);
        $items = $query->result();

        return $items;
    }

    public function get_food_items()
    {
        $where = 'oi.order_id IN(SELECT `id` FROM `order` WHERE status=1)';
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
        $profile = $this->app->profile_lib->get_profile();
        $profile_id = $profile->id;

        // เตรียมข้อมูลก่อนจะบันทึกลง database
        $data = [
            'status' => 2,
            'rider_id' => $profile_id,
            'updated_at' => now(),
        ];
        $where = "id={$id}";

        // บันทึกข้อมูลลงใน database
        return $this->app->database_lib->update('order', $data, $where);
    }
}
