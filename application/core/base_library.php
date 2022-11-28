<?php

class Base_library extends Base_object
{
    public function publish($table_name = '', $id = 0)
    {
        if (empty($table_name) || empty($id)) {
            return false;
        }
        $data = [
            'status' => 1,
            'updated_at' => now(),
        ];

        $where = "id={$id}";

        return $this->app->db->update($table_name, $data, $where);
    }

    public function unpublish($table_name = '', $id = 0)
    {
        if (empty($table_name) || empty($id)) {
            return false;
        }
        $data = [
            'status' => 0,
            'updated_at' => now(),
        ];

        $where = "id={$id}";

        return $this->app->db->update($table_name, $data, $where);
    }

    public function trash($table_name = '', $id = 0)
    {
        if (empty($table_name) || empty($id)) {
            return false;
        }
        $data = [
            'status' => (-1),
            'updated_at' => now(),
        ];

        $where = "id={$id}";

        return $this->app->db->update($table_name, $data, $where);
    }

    public function restore($table_name = '', $id = 0)
    {
        $data = [
            'status' => 0,
            'updated_at' => now(),
        ];

        $where = "id={$id}";

        return $this->app->db->update($table_name, $data, $where);
    }

    public function delete($table_name = '', $id = 0)
    {
        $where = "id={$id}";

        return $this->app->db->delete($table_name, $where);
    }

    public function render_query_where($wheres = [], $options = [])
    {
        // render : wheres
        if (!isset($options['where_type'])) {
            $options['where_type'] = 'AND';
        }
        $sql_wheres = (count($wheres) >= 2) ? implode(" {$options['where_type']} ", $wheres) : implode(' ', $wheres);
        // render : orderby
        $filter_orderby_value = $this->get_query_order_by($options);
        // render : limit
        $filter_limit_value = $this->get_query_limit($options);
        $sql_wheres .= $filter_orderby_value;
        $sql_wheres .= $filter_limit_value;

        return $sql_wheres;
    }

    public function get_query_status($options)
    {
        $filter_status = '';
        if (!isset($options['filter_status'])) {
            $filter_status = $this->app->input->get_post('filter_status');
        } else {
            $filter_status = $options['filter_status'];
        }
        $filter_status_value = '0,1';
        if (isset($options['status'])) {
            if (is_array($options['status'])) {
                $filter_status_value = implode(',', $options['status']);
            } elseif ($options['status'] == 'all') {
                $filter_status_value = '0,1';
            } elseif ($options['status'] == 'publish') {
                $filter_status_value = '1';
            } elseif ($options['status'] == 'unpublish') {
                $filter_status_value = '0';
            } elseif ($options['status'] == 'trash') {
                $filter_status_value = '-1';
            } else {
                $filter_status_value = $options['status'];
            }
        } else {
            if ($filter_status == 'publish') {
                $filter_status_value = '1';
            } elseif ($filter_status == 'unpublish') {
                $filter_status_value = '0';
            } elseif ($filter_status == 'trash') {
                $filter_status_value = '-1';
            }
        }

        return $filter_status_value;
    }

    public function get_query_order_by($options)
    {
        $filter_orderby = '';
        if (isset($options['orderby'])) {
            $filter_orderby = $options['orderby'];
        }
        $sql_wheres = '';
        if (!empty($filter_orderby)) {
            $sql_wheres = " ORDER BY {$filter_orderby} ";
        }

        return $sql_wheres;
    }

    public function get_query_limit($options)
    {
        $filter_page = $this->app->input->get_post('per_page');
        if (isset($options['per_page'])) {
            $filter_page = $options['per_page'];
        }
        $filter_limit = 10;
        if (isset($options['limit'])) {
            $filter_limit = $options['limit'];
        }
        $sql_wheres = '';
        $limit = '';
        if (!empty($filter_limit) && $filter_limit != 'all') {
            $filter_offset_value = 0;
            if ($filter_page > 1) {
                $filter_offset_value = ($filter_page - 1) * $filter_limit;
            }
            $filter_limit_value = $filter_limit;
            $limit = " LIMIT {$filter_offset_value},{$filter_limit_value} ";
        }
        if (!isset($options['no_limit'])) {
            $sql_wheres .= $limit;
        }

        return $sql_wheres;
    }
}
