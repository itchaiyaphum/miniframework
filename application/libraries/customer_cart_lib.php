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

    public function add_to_cart($restaurant_id = 0, $food_id = 0)
    {
        // ลูกค้าที่สั่งซื้ออาหาร
        $profile = $this->app->profile_lib->get_profile();
        $profile_id = $profile->id;

        // เตรียมข้อมูลก่อนจะบันทึกลง database
        $data = [
            'user_id' => $profile_id,
            'restaurant_id' => $restaurant_id,
            'food_id' => $food_id,
            'food_amount' => 1,
        ];

        // บันทึกข้อมูลลงใน database
        return $this->app->database_lib->insert('cart', $data);
    }
}
