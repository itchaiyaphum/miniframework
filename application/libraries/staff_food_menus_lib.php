<?php

class Staff_food_menus_lib extends Library
{
    public function save($form_data = null)
    {
        $profile = $this->app->profile_lib->get_profile();
        $profile_id = $profile->id;

        $thumbnail = '/storage/food/no-thumbnail.png';

        // หากค่า id ไม่เท่ากับ 0 แสดงว่าคือการอัพเดต
        if ($form_data['id'] != 0) {
            // ดึงข้อมูลเดิมมาจาก database
            $sql = "SELECT * FROM `food_menus` WHERE `id`={$form_data['id']}";
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
                'upload_path' => 'storage/food',
            ];
            $thumbnail_data = $this->app->upload_lib->do_upload('thumbnail', $upload_config);
            if ($thumbnail_data['status']) {
                $thumbnail = '/storage/food/'.$thumbnail_data['new_file_name'];
            }
        }

        // หากค่า id=0 แสดงว่าคือ การเพิ่ม
        if ($form_data['id'] == 0) {
            // เตรียมข้อมูลสำหรับบันทึกลงใน database
            $data = [
                'title' => $form_data['title'],
                'restaurant_id' => $profile_id,
                'food_category_id' => $form_data['food_category_id'],
                'price' => $form_data['price'],
                'discount_percent' => $form_data['discount_percent'],
                'thumbnail' => $thumbnail,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ];

            return $this->app->database_lib->insert('food_menus', $data);
        }
        // หากไม่ใช่ ก็คือการ อัพเดต
        else {
            // เตรียมข้อมูลสำหรับบันทึกลงใน database
            $data = [
                'title' => $form_data['title'],
                'restaurant_id' => $profile_id,
                'food_category_id' => $form_data['food_category_id'],
                'price' => $form_data['price'],
                'discount_percent' => $form_data['discount_percent'],
                'thumbnail' => $thumbnail,
                'updated_at' => now(),
            ];
            $where = "`id`={$form_data['id']}";

            return $this->app->database_lib->update('food_menus', $data, $where);
        }
    }

    public function get_items($options = [])
    {
        $where = $this->get_query_where($options);
        $sql = "SELECT fm.*, fc.title as `food_category_name` FROM `food_menus` as fm 
                LEFT JOIN `food_categories` as fc ON(fm.food_category_id=fc.id) WHERE {$where}";
        $query = $this->app->database_lib->query($sql);
        $items = $query->result();

        return $items;
    }

    public function get_item($id = 0)
    {
        $sql = "SELECT * FROM `food_menus` WHERE `id`={$id}";
        $query = $this->app->database_lib->query($sql);
        $item = $query->row();

        return $item;
    }

    public function get_query_where($options)
    {
        $profile = $this->app->profile_lib->get_profile();
        $profile_id = $profile->id;

        $filter_search = $this->app->input_lib->get_post('filter_search');

        $wheres = [];

        // filter: status
        $wheres[] = 'fm.status IN(0,1)';
        $wheres[] = "fm.restaurant_id={$profile_id}";

        // filter: search
        if ($filter_search != '') {
            $filter_search_value = $filter_search;
            $wheres[] = "(fm.title LIKE '%{$filter_search_value}%')";
        }

        // render query
        return $this->render_query_where($wheres, $options);
    }
}
