<?php

class Province_lib extends Library
{
    public function get_items()
    {
        $query = $this->app->db->query('SELECT * FROM provinces');

        return $query->result();
    }
}
