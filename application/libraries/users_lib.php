<?php

class Users_lib extends Base_object
{
    public function get_items()
    {
        $query = $this->app->db->query('SELECT * FROM users');

        return $query->result();
    }
}
