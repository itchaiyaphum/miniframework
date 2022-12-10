<?php

class Province_lib extends Library
{
    public function get_items()
    {
        $query = $this->app->database_lib->query('SELECT * FROM provinces');

        return $query->result();
    }
}
