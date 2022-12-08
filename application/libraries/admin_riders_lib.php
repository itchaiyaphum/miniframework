<?php

class Admin_riders_lib extends Library
{
    public function get_items($options = [])
    {
        $where = $this->get_query_where($options);
        $sql = "SELECT * FROM users WHERE {$where}";
        $query = $this->app->db->query($sql);
        $items = $query->result();

        return $items;
    }

    public function get_item($id = 0)
    {
        $sql = "SELECT * FROM users WHERE id={$id}";
        $query = $this->app->db->query($sql);
        $item = $query->row();

        return $item;
    }

    public function public_rider($rider_id = 0)
    {
        return true;
    }

    public function delete_rider($rider_id = 0)
    {
        return true;
    }

    public function get_query_where($options)
    {
        $filter_search = $this->app->input->get_post('riders_filter_search');
        $filter_status = $this->app->input->get_post('riders_filter_status');

        $wheres = [];

        // filter: status
        $options['filter_status'] = $filter_status;
        $filter_status_value = $this->get_query_status($options);
        $wheres[] = "status IN({$filter_status_value})";

        // filter: user_type
        $wheres[] = "user_type='rider'";

        // filter: search
        if ($filter_search != '') {
            $filter_search_value = $filter_search;
            $wheres[] = "(firstname LIKE '%{$filter_search_value}%' OR lastname LIKE '%{$filter_search_value}%' OR email LIKE '%{$filter_search_value}%')";
        }

        // render query
        return $this->render_query_where($wheres, $options);
    }
}
