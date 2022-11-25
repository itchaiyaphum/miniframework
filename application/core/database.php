<?php

class Database extends Base_object
{
    public $db = null;
    public $result = null;

    public function connect_db()
    {
        // Create connection
        $conn = new mysqli($this->app->config['database']['hostname'], $this->app->config['database']['username'], $this->app->config['database']['password'], $this->app->config['database']['db_name']);
        $conn->set_charset($this->app->config['database']['charset']);

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
        $data_keys = [];
        $data_values = [];
        foreach ($data as $key => $value) {
            array_push($data_keys, "`{$key}`");
            array_push($data_values, $this->_escape($value));
        }
        $data_keys_sql = implode(',', $data_keys);
        $data_values_sql = implode(',', $data_values);

        // insert data to database
        $sql = "INSERT INTO `{$table_name}` ({$data_keys_sql}) VALUES ({$data_values_sql})";

        return $this->db->query($sql);
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
            array_push($data_array, "`{$key}`={$this->_escape($value)}");
        }
        $data_to_sql = implode(',', $data_array);

        // update data to database
        $sql = "UPDATE `{$table_name}` SET {$data_to_sql} WHERE {$where}";
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

    private function _escape($str)
    {
        if (is_string($str)) {
            return "'".mysqli_real_escape_string($this->db, $str)."'";
        } elseif (is_bool($str)) {
            return ($str === false) ? 0 : 1;
        } elseif ($str === null) {
            return 'NULL';
        }

        return $str;
    }
}
