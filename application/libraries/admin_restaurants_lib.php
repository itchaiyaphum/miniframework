<?php

class Admin_restaurants_lib extends Library
{
    public function save($form_data = null)
    {
        // check form_data not null
        if (!is_array($form_data)) {
            return false;
        }

        // insert data
        if ($form_data['id'] == 0) {
            // preparing data
            $data = [
                'title' => $form_data['title'],
                'status' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ];

            return $this->app->database_lib->insert('restaurants', $data);
        }
        // update data
        else {
            // preparing data
            $data = [
                'title' => $form_data['title'],
                'updated_at' => now(),
            ];
            $where = 'id='.$form_data['id'];

            return $this->app->database_lib->update('restaurants', $data, $where);
        }
    }

    public function get_items($options = [])
    {
        $where = $this->get_query_where($options);
        $sql = "SELECT * FROM restaurants WHERE {$where}";
        $query = $this->app->database_lib->query($sql);
        $items = $query->result();

        return $items;
    }

    public function get_item($id = 0)
    {
        $sql = "SELECT * FROM restaurants WHERE id={$id}";
        $query = $this->app->database_lib->query($sql);
        $item = $query->row();

        return $item;
    }

    public function publish_restaurant($restaurant_id = 0)
    {
        return true;
    }

    public function delete_restaurant($restaurant_id = 0)
    {
        return true;
    }

    public function get_query_where($options)
    {
        $filter_search = $this->app->input_lib->get_post('filter_search');
        $filter_status = $this->app->input_lib->get_post('filter_status');

        $wheres = [];

        // filter: status
        $options['filter_status'] = $filter_status;
        $filter_status_value = $this->get_query_status($options);
        $wheres[] = "status IN({$filter_status_value})";

        // filter: search
        if ($filter_search != '') {
            $filter_search_value = $filter_search;
            $wheres[] = "(title LIKE '%{$filter_search_value}%')";
        }

        // render query
        return $this->render_query_where($wheres, $options);
    }
}
