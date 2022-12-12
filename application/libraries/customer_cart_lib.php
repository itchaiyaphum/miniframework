<?php

class Customer_cart_lib extends Library
{
    public function get_items($options = [])
    {
        $profile = $this->app->profile_lib->get_profile();
        $profile_id = $profile->id;

        $where = "cart.user_id={$profile_id} AND fm.status=1";
        $sql = "SELECT cart.*
                , fm.title as `food_name` 
                , fm.price as `food_price` 
                , fm.discount_percent as `food_discount_percent` 
                , fm.thumbnail as `food_thumbnail` 
                FROM `cart`
                LEFT JOIN `food_menus` as fm ON(cart.food_id=fm.id) WHERE {$where}";
        $query = $this->app->database_lib->query($sql);
        $items = $query->result();

        return $items;
    }

    public function is_multiple_restaurant_order()
    {
        $profile = $this->app->profile_lib->get_profile();
        $profile_id = $profile->id;

        $where = "user_id={$profile_id}";
        $sql = "SELECT count(restaurant_id) as restaurant_amount FROM `cart`  WHERE {$where} GROUP BY restaurant_id";
        $query = $this->app->database_lib->query($sql);
        $items = $query->result();

        if (count($items) >= 2) {
            return true;
        }

        return false;
    }

    public function delete_item($order_id = 0, $item_id = 0)
    {
        return true;
    }

    /*
    status: 0 = รอการยืนยันสั่งซื้อ (customer)
    status: 1 = ยืนยันสั่งซื้ออาหารแล้ว (staff)
    status: 2 = รับออร์เดอร์ไปส่งอาหาร (rider)
    status: 3 = ส่งอาหารและได้รับเงินเรียบร้อย (rider)
    */
    public function order()
    {
        $profile = $this->app->profile_lib->get_profile();
        $profile_id = $profile->id;

        // ดึงค่ารายการอาหารที่ใส่ตระกร้าไว้มาจาก database
        $sql = "SELECT cart.* 
                ,fm.price as price
                ,fm.discount_percent as discount_percent
                FROM `cart` 
                LEFT JOIN food_menus as fm ON (cart.food_id=fm.id)
                WHERE cart.user_id={$profile_id}";
        $cart_items = $this->app->database_lib->query($sql)->result();
        if (empty($cart_items)) {
            return false;
        }

        $restaurant_id = 0;
        $total_summary_price = 0;
        for ($i = 0; $i < count($cart_items); ++$i) {
            $item = $cart_items[$i];
            $restaurant_id = $item['restaurant_id'];

            $percent = (float) $item['discount_percent'];
            $old_price = (float) $item['price'];
            $discount_value = ($old_price / 100) * $percent;
            $price_after_discount = $old_price - $discount_value;

            $total_summary_price += $price_after_discount;
        }

        // เตรียมข้อมูลก่อนจะบันทึกลง database
        $data = [
            'customer_id' => $profile_id,
            'restaurant_id' => $restaurant_id,
            'total_price' => $total_summary_price,
            'status' => 0,
            'review_status' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ];

        // บันทึกข้อมูลลงใน database
        if (!$this->app->database_lib->insert('orders', $data)) {
            return false;
        }
        $order_id = $this->app->database_lib->get_insert_id();

        // insert food items
        foreach ($cart_items as $item) {
            $percent = (float) $item['discount_percent'];
            $old_price = (float) $item['price'];
            $discount_value = ($old_price / 100) * $percent;
            $price_after_discount = $old_price - $discount_value;
            $food_amount = (int) $item['food_amount'];
            $total_price = $price_after_discount * $food_amount;

            $data = [
                'order_id' => $order_id,
                'food_id' => $item['food_id'],
                'food_price' => $old_price,
                'food_discount_price' => $price_after_discount,
                'food_amount' => $food_amount,
                'food_total' => $total_price,
            ];
            $this->app->database_lib->insert('orders_items', $data);
        }

        // เมื่อสั่งซื้อเรียบร้อย ให้ทำการเครียร์ตะกร้าสินค้าให้ว่าง
        $this->app->database_lib->delete('cart', "user_id={$profile_id}");

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
