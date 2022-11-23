<?php

function &get_instance()
{
    return App::get_instance();
}

function base_url($url = '')
{
    $base_url = 'http://dev.miniframework.itchaiyaphum.com/';
    if ($url == '/') {
        $url = '';
    }

    return $base_url.$url;
}

function redirect($url = '/')
{
    header('Location: '.base_url($url));
}

function validation_errors()
{
    $app = &get_instance();

    if ($app->form_validation->error_status === true) {
        echo '<div class="alert alert-danger">'.$app->form_validation->error_messages.'</div>';
    }
}
