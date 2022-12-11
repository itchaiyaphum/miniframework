<?php

class Customer_restaurants_lib extends Library
{
    public function get_items($options = [])
    {
        $where = $this->get_query_where($options);
        $sql = "SELECT users.*, rt.title as `restaurant_type_name` FROM `users`
                LEFT JOIN `restaurant_types` as rt ON(users.id=rt.id) WHERE {$where}";
        $query = $this->app->database_lib->query($sql);
        $items = $query->result();

        return $items;
    }

    public function get_item($id = 0, $options = [])
    {
        $where = $this->get_query_where($options);
        $sql = "SELECT users.*, rt.title as `restaurant_type_name` FROM `users`
                LEFT JOIN `restaurant_types` as rt ON(users.id=rt.id) WHERE {$where}";
        $query = $this->app->database_lib->query($sql);
        $item = $query->row();

        return $item;
    }

    public function get_query_where($options)
    {
        $id = $this->app->input_lib->get_post('id');
        $filter_search = $this->app->input_lib->get_post('filter_search');

        $wheres = [];

        // filter: status
        $wheres[] = 'users.status IN(0,1)';
        $wheres[] = "users.user_type='staff'";

        // filter: search
        if ($filter_search != '') {
            $filter_search_value = $filter_search;
            $wheres[] = "(users.restaurant_name LIKE '%{$filter_search_value}%')";
        }

        // render query
        return $this->render_query_where($wheres, $options);
    }

    public function get_food_categories()
    {
        $sql = 'SELECT * FROM `food_categories` WHERE `status` IN (1)';
        $query = $this->app->database_lib->query($sql);
        $items = $query->result();

        return $items;
    }

    public function get_food_menus($restaurant_id = 0, $food_category_id = 0)
    {
        $where_food_category = '';
        // หากมีการเลือก food_category ด้วย
        if ($food_category_id != 0) {
            $where_food_category = "AND fm.food_category_id={$food_category_id}";
        }

        $sql = "SELECT fm.*, fc.title as `food_category_name` FROM `food_menus` as fm 
                LEFT JOIN `food_categories` as fc ON(fm.food_category_id=fc.id) WHERE fm.restaurant_id={$restaurant_id} {$where_food_category}";
        $query = $this->app->database_lib->query($sql);
        $items = $query->result();

        return $items;
    }

    public function get_reviews()
    {
        $sql = 'SELECT reviews.*
                    , users.firstname as `customer_firstname`
                    ,users.lastname as `customer_lastname` FROM `reviews`
                LEFT JOIN `users` ON(reviews.user_id=users.id)';
        $query = $this->app->database_lib->query($sql);
        $items = $query->result();

        return $items;
    }
}
