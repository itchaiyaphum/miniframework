<?php

function get_instance()
{
    return $app;
}

function base_url($url = '')
{
    $base_url = 'http://dev.miniframework.itchaiyaphum.com/';

    return $base_url.$url;
}
