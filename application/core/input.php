<?php

class Input extends Base_object
{
    // get input type get
    public function get($var_name = '', $default = '')
    {
        if (isset($_GET[$var_name])) {
            return $_GET[$var_name];
        }

        return $default;
    }

    // get input type post
    public function post($var_name = '', $default = '')
    {
        if (isset($_POST[$var_name])) {
            return $_POST[$var_name];
        }

        return $default;
    }

    // get file upload data
    public function file($var_name = '', $default = '')
    {
        if (isset($_FILES[$var_name])) {
            return $_FILES[$var_name];
        }

        return $default;
    }

    // get session data
    public function session($var_name = '', $default = '')
    {
        if (isset($_SESSION[$var_name])) {
            return $_SESSION[$var_name];
        }

        return $default;
    }

    // get input type get,post
    public function get_post($var_name = '', $default = '')
    {
        $result_get = $this->get($var_name, $default);
        $result_post = $this->post($var_name, $default);
        $result_file = $this->file($var_name, $default);

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
