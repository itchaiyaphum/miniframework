<?php

class Users_lib extends Library
{
    public function get_items()
    {
        $query = $this->app->database_lib->query('SELECT * FROM users');

        return $query->result();
    }
}
