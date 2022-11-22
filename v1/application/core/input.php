<?php

class Input
{
    public $app = null;

    public function __construct($app = null)
    {
        $this->app = $app;
    }

    public function get($var_name = '', $default = '')
    {
        return $default;
    }

    public function get_post($var_name = '', $default = '')
    {
        return $default;
    }

    public function post($var_name = '', $default = '')
    {
        return $default;
    }
}
