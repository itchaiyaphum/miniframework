<?php

class Admin_restaurant_types_lib extends Library
{
    public function save($form_data = null)
    {
        $thumbnail = '/storage/restaurant_type/no-thumbnail.png';

        // หากค่า id ไม่เท่ากับ 0 แสดงว่าคือการอัพเดต
        if ($form_data['id'] != 0) {
            // ดึงข้อมูลเดิมมาจาก database
            $sql = "SELECT * FROM `restaurant_types` WHERE `id`={$form_data['id']}";
            $data_db = $this->app->database_lib->query($sql)->row();

            if (empty($data_db)) {
                return false;
            }

            $thumbnail = $data_db['thumbnail'];
        }

        // หากมีการอัพโหลดรูปภาพ เข้ามาใหม่ ให้อัพโหลดรูปภาพใหม่
        if (isset($_FILES['thumbnail'])) {
            // upload thumbnail
            $upload_config = [
                'upload_path' => 'storage/restaurant_type',
            ];
            $thumbnail_data = $this->app->upload_lib->do_upload('thumbnail', $upload_config);
            if ($thumbnail_data['status']) {
                $thumbnail = '/storage/restaurant_type/'.$thumbnail_data['new_file_name'];
            }
        }

        // หากค่า id=0 แสดงว่าคือ การเพิ่ม
        if ($form_data['id'] == 0) {
            // เตรียมข้อมูลสำหรับบันทึกลงใน database
            $data = [
                'title' => $form_data['title'],
                'thumbnail' => $thumbnail,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ];

            return $this->app->database_lib->insert('restaurant_types', $data);
        }
        // หากไม่ใช่ ก็คือการ อัพเดต
        else {
            // เตรียมข้อมูลสำหรับบันทึกลงใน database
            $data = [
                'title' => $form_data['title'],
                'thumbnail' => $thumbnail,
                'updated_at' => now(),
            ];
            $where = "`id`={$form_data['id']}";

            return $this->app->database_lib->update('restaurant_types', $data, $where);
        }
    }

    public function get_items($options = [])
    {
        $where = $this->get_query_where($options);
        $sql = "SELECT * FROM `restaurant_types` WHERE {$where}";
        $query = $this->app->database_lib->query($sql);
        $items = $query->result();

        return $items;
    }

    public function get_item($id = 0)
    {
        $sql = "SELECT * FROM restaurant_types WHERE id={$id}";
        $query = $this->app->database_lib->query($sql);
        $item = $query->row();

        return $item;
    }

    public function get_query_where($options)
    {
        $filter_search = $this->app->input_lib->get_post('filter_search');

        $wheres = [];

        // filter: status
        $wheres[] = 'status IN(0,1)';

        // filter: search
        if ($filter_search != '') {
            $filter_search_value = $filter_search;
            $wheres[] = "(title LIKE '%{$filter_search_value}%')";
        }

        // render query
        return $this->render_query_where($wheres, $options);
    }
}
