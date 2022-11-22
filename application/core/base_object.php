<?php

class Base_object
{
    public $app = null;

    public function __construct($app = null)
    {
        $this->app = $app;
    }
}
