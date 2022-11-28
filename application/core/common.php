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

function html_escape($var, $double_encode = true)
{
    if (empty($var)) {
        return $var;
    }

    if (is_array($var)) {
        foreach (array_keys($var) as $key) {
            $var[$key] = html_escape($var[$key], $double_encode);
        }

        return $var;
    }

    return htmlspecialchars($var, ENT_QUOTES, 'UTF-8', $double_encode);
}

function set_value($field, $default = '', $html_escape = true)
{
    $app = &get_instance();

    $value = $app->input->post($field, false);

    isset($value) or $value = $default;

    return ($html_escape) ? html_escape($value) : $value;
}

function set_select($field, $value = '', $default = false)
{
    $app = &get_instance();

    if (($input = $app->input->post($field, false)) === null) {
        return ($default === true) ? ' selected="selected"' : '';
    }

    $value = (string) $value;
    if (is_array($input)) {
        // Note: in_array('', array(0)) returns TRUE, do not use it
        foreach ($input as &$v) {
            if ($value === $v) {
                return ' selected="selected"';
            }
        }

        return '';
    }

    return ($input === $value) ? ' selected="selected"' : '';
}

function get_filter_status($filter_name = '')
{
    $app = &get_instance();

    return $app->input->post($filter_name, false);
}

function admin_filter_status_html($name = 'filter_status')
{
    return '
            <select class="form-select" name="'.$name.'" onchange="this.form.submit();">
                <option value="all" '.set_select($name, 'all', true).'>- แสดงสถานะทั้งหมด -</option>
                <option value="publish" '.set_select($name, 'publish').'>เผยแพร่</option>
                <option value="unpublish" '.set_select($name, 'unpublish').'>ไม่เผยแพร่</option>
                <option value="trash" '.set_select($name, 'trash').'>อยู่ในถังขยะ</option>
            </select>
        ';
}

function admin_filter_search_html($name = 'filter_search')
{
    return '
    <div class="input-group">
        <input type="text" name="'.$name.'" id="search" value="'.set_value($name).'" class="form-control" onchange="this.form.submit();" />
        <button class="input-group-text" onclick="this.form.submit();">
            <i class="bi-search"></i>
        </button>
        <button class="input-group-text" onclick="document.getElementById(\'search\').value=\'\'; this.form.submit();">
            <i class="bi-backspace"></i>
        </button>
    </div>
    ';
}

function get_pagination_index($i = 0, $limit = 10)
{
    $app = &get_instance();
    $page = $app->input->get_post('per_page', 1);
    if ($page == 2) {
        return $limit + $i;
    } elseif ($page >= 3) {
        return ($page - 1) * $limit + $i;
    }

    return $i;
}

function get_status_icon($status = 0)
{
    $icon = '-';
    if ($status == 0) {
        $icon = '<div class="btn btn-sm btn-danger"><i class="bi-x-circle-fill"></i></div>';
    } elseif ($status == 1) {
        $icon = '<div class="btn btn-sm btn-success"><i class="bi-check-circle-fill"></i></div>';
    } elseif ($status == (-1)) {
        $icon = '<div class="btn btn-sm btn-primary"><i class="bi-trash"></i></div>';
    }

    return $icon;
}
