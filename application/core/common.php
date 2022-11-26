<?php

function &get_instance()
{
    return App::get_instance();
}

function base_url($url = '')
{
    $app = &get_instance();
    $base_url = $app->config['base_url'];
    if ($url == '/') {
        $url = '';
    }

    return $base_url.$url;
}

function redirect($url = '/')
{
    header('Location: '.base_url($url));
}

function get_datetime($date = '0000-00-00 00:00:00', $format = 'Y-m-d H:i:s')
{
    return date_format(date_create($date), $format);
}

function now()
{
    return date('Y-m-d H:i:s');
}

function validation_errors()
{
    $app = &get_instance();

    if ($app->form_validation->error_status === true) {
        echo '<div class="alert alert-danger">'.$app->form_validation->error_messages.'</div>';
    }
}

function action_messages()
{
    $app = &get_instance();

    if ($app->form_validation->action_status === 'success') {
        echo '<div class="alert alert-success">'.$app->form_validation->action_messages.'</div>';
    }
}
