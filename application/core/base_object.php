<?php

class Base_object
{
    public $app = null;

    public function __construct($app = null)
    {
        $this->app = $app;
    }

    public function fetch_from_array(&$array, $index = null, $default = null)
    {
        // If $index is NULL, it means that the whole $array is requested
        isset($index) or $index = array_keys($array);

        // get all data if not pass INDEX
        if (is_array($index)) {
            $output = [];
            foreach ($index as $key) {
                $output[$key] = $this->fetch_from_array($array, $key, $default);
            }

            return $output;
        }

        // get value by INDEX
        $value = '';
        if (isset($array[$index])) {
            $value = $array[$index];
        }

        // set default value
        if (empty($value)) {
            $value = $default;
        }

        return $value;
    }
}
