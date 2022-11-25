<?php

class Input extends Base_object
{
    // get input type get
    public function get($index = null, $default = null)
    {
        return $this->fetch_from_array($_GET, $index, $default);
    }

    // get input type post
    public function post($index = null, $default = null)
    {
        return $this->fetch_from_array($_POST, $index, $default);
    }

    // get file upload data
    public function file($index = null, $default = null)
    {
        return $this->fetch_from_array($_FILES, $index, $default);
    }

    // get session data
    public function session($index = null, $default = null)
    {
        return $this->fetch_from_array($_SESSION, $index, $default);
    }

    // get input type get,post
    public function get_post($index = null, $default = null)
    {
        $result_get = $this->get($index, $default);
        $result_post = $this->post($index, $default);
        $result_file = $this->file($index, $default);

        if (!empty($result_get)) {
            return $result_get;
        } elseif (!empty($result_post)) {
            return $result_post;
        } elseif (!empty($result_file)) {
            return $result_file;
        }

        return $default;
    }
}
