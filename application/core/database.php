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
        $conn->set_charset($config_dabase['charset']);

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

    // insert data
    public function insert($table_name = null, $data = null)
    {
        if (empty($table_name) || empty($data)) {
            exit('table or data is not set!');
        }

        // preparing data
        $data_key = [];
        $data_value = [];
        foreach ($data as $key => $value) {
            array_push($data_key, $key);
            array_push($data_value, $value);
        }
        $data_key_sql = implode(',', $data_array);
        $data_value_sql = implode(',', $data_array);

        // insert data to database
        $sql = "INSERT INTO {$table_name} ({$data_key_sql}) VALUES ({$data_value_sql})";
        if ($this->db->query($sql) === true) {
            return true;
        }
    }

    // update data
    public function update($table_name = null, $data = null, $where = null)
    {
        if (empty($table_name) || empty($data) || empty($where)) {
            exit('table or data is not set!');
        }

        // preparing data
        $data_array = [];
        foreach ($data as $key => $value) {
            array_push($data_array, "{$key}={$value}");
        }
        $data_to_sql = implode(',', $data_array);

        // update data to database
        $sql = "UPDATE {$table_name} SET {$data_to_sql} WHERE {$where}";
        if ($this->db->query($sql) === true) {
            return true;
        }

        return false;
    }

    // delete data
    public function delete($table_name = null, $where = null)
    {
        if (empty($table_name) || empty($where)) {
            exit('table or data is not set!');
        }
        // delete data to database
        $sql = "DELETE FROM {$table_name} WHERE {$where}";
        if ($this->db->query($sql) === true) {
            return true;
        }

        return false;
    }
}
