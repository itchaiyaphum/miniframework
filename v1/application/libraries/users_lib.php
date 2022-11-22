<?php

class Users_lib
{
    public function get_items()
    {
        $query = $this->app->db->query('SELECT * FROM users');
        foreach ($query->result_array() as $item) {
            print_r($item);
        }
    }
}
