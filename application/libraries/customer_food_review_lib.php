<?php

class Customer_food_review_lib extends Library
{
    public function get_order_items($id = 0)
    {
        $where = "o.id={$id} AND o.status=3";
        $sql = "SELECT o.*
                , u.restaurant_name as `restaurant_name` 
                , u.thumbnail as `restaurant_thumbnail` 
                FROM `orders` as o
                LEFT JOIN `users` as u ON(o.customer_id=u.id) WHERE {$where} ORDER BY o.created_at DESC";
        $query = $this->app->database_lib->query($sql);
        $items = $query->result();

        return $items;
    }

    public function get_food_items($id = 0)
    {
        $where = "oi.order_id={$id}";
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

    public function review($review_data = [])
    {
        $profile = $this->app->profile_lib->get_profile();
        $profile_id = $profile->id;

        // บันทึกข้อมูลการรีวิว
        $data = [
            'order_id' => $review_data['id'],
            'user_id' => $profile_id,
            'restaurant_id' => $review_data['restaurant_id'],
            'detail' => $review_data['detail'],
            'created_at' => now(),
            'updated_at' => now(),
        ];
        $this->app->database_lib->insert('reviews', $data);

        // ตั้งค่าให้รู้ว่ามีการ review แล้ว
        $data = [
            'review_status' => 1,
            'updated_at' => now(),
        ];
        $review_where = "id={$review_data['id']}";

        return $this->app->database_lib->update('orders', $data, $review_where);
    }
}
