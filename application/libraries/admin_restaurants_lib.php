<?php

class Admin_restaurants_lib extends Library
{
    public function get_items($options = [])
    {
        $where = $this->get_query_where($options);
        $sql = "SELECT * FROM `users` WHERE {$where}";
        $query = $this->app->database_lib->query($sql);
        $items = $query->result();

        return $items;
    }

    public function get_query_where($options)
    {
        $filter_search = $this->app->input_lib->get_post('filter_search');

        $wheres = [];

        // filter: status
        $wheres[] = " `user_type`='staff' ";
        $wheres[] = ' `status` IN(0,1) ';

        // filter: search
        if ($filter_search != '') {
            $filter_search_value = $filter_search;
            $wheres[] = "(`restaurant_name` LIKE '%{$filter_search_value}%')";
        }

        // render query
        return $this->render_query_where($wheres, $options);
    }
}
