<?php

class Database
{
    public $app = null;

    public function __construct($app = null)
    {
        $this->app = $app;
    }

    public function query($sql = '')
    {
        // get result from database
        return $this;
    }

    public function result()
    {
        $obj = new stdClass();
        $obj->firsntmae = 'wannapong';
        $obj->lastname = 'kumjumpon';
        $obj->email = 'wannapong.kjp@gmail.com';

        return [
            $obj,
            $obj,
        ];
    }

    public function result_array()
    {
        return [
            ['firstname' => 'wannapong', 'lastname' => 'kumjumpon', 'email' => 'wannapong.kjp@gmail.com'],
            ['firstname' => 'aodto', 'lastname' => 'wk', 'email' => 'aodto.wk@gmail.com'],
        ];
    }

    public function row()
    {
        $obj = new stdClass();
        $obj->firsntmae = 'wannapong';
        $obj->lastname = 'kumjumpon';
        $obj->email = 'wannapong.kjp@gmail.com';

        return $obj;
    }

    public function row_array()
    {
        return ['firstname' => 'wannapong', 'lastname' => 'kumjumpon', 'email' => 'wannapong.kjp@gmail.com'];
    }
}
