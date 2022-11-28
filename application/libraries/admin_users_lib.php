<?php

class Admin_users_lib extends Base_library
{
    public function get_pagination()
    {
        return $this->app->helper_lib->getPagination([
            'base_url' => '/admin_users.php',
            'total_rows' => count($this->get_items([
                'no_limit' => true,
            ])),
            'per_page' => 10,
        ]);
    }

    public function get_items($options = [])
    {
        $where = $this->get_query_where($options);
        $sql = "SELECT * FROM users WHERE {$where}";
        $query = $this->app->db->query($sql);
        $items = $query->result();

        return $items;
    }

    public function get_item($id = 0)
    {
        $sql = "SELECT * FROM users WHERE id={$id}";
        $query = $this->app->db->query($sql);
        $item = $query->row();

        return $item;
    }

    public function bypass_login($id = 0)
    {
        $profile = $this->app->profile_lib->get_profile_by_id($id);

        return $this->app->auth_lib->set_login_session($profile);
    }

    public function get_query_where($options)
    {
        $filter_search = $this->app->input->get_post('users_filter_search');
        $filter_user_type = $this->app->input->get_post('users_filter_user_type');
        $filter_status = $this->app->input->get_post('users_filter_status');

        $wheres = [];

        // filter: status
        $options['filter_status'] = $filter_status;
        $filter_status_value = $this->get_query_status($options);
        $wheres[] = "status IN({$filter_status_value})";

        // filter: user_type
        if ($filter_user_type != '') {
            $filter_user_type_value = $filter_user_type;
            $wheres[] = "user_type='{$filter_user_type_value}'";
        }

        // filter: search
        if ($filter_search != '') {
            $filter_search_value = $filter_search;
            $wheres[] = "(firstname LIKE '%{$filter_search_value}%' OR lastname LIKE '%{$filter_search_value}%' OR email LIKE '%{$filter_search_value}%')";
        }

        // render query
        return $this->render_query_where($wheres, $options);
    }
}
