<?php

class Database extends Base_object
{
    public $app = null;
    public $db = null;
    public $result = null;

    public function __construct($app = null)
    {
        $this->app = $app;
        $this->_connect_database();
    }

    private function _connect_database()
    {
        // load database configuration
        require_once APPPATH.DS.'config'.DS.'database.php';

        // Create connection
        $conn = new mysqli($config_dabase['hostname'], $config_dabase['username'], $config_dabase['password'], $config_dabase['db_name']);

        // Check connection
        if ($conn->connect_error) {
            exit('Connection failed: '.$conn->connect_error);
        }

        $this->db = $conn;
    }

    public function query($sql = '')
    {
        // get result from database
        $result = $this->db->query($sql);
        $this->result = $result;

        return $this;
    }

    public function result()
    {
        if ($this->result->num_rows > 0) {
            return $this->result->fetch_all(MYSQLI_ASSOC);
        }

        return false;
    }

    public function row()
    {
        if ($this->result->num_rows > 0) {
            return $this->result->fetch_array(MYSQLI_ASSOC);
        }

        return false;
    }
}
