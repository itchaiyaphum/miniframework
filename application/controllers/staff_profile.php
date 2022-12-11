<?php

class Staff_profile extends Controller
{
    public function index()
    {
        // get data from login_form
        $profile_data = $this->app->input_lib->post();

        // set rules for validation data
        $this->app->form_validation_lib->set_rules('firstname', 'ชื่อ', 'required');
        $this->app->form_validation_lib->set_rules('lastname', 'นามสกุล', 'required');
        $this->app->form_validation_lib->set_rules('mobile_no', 'เบอร์โทร', 'required');
        $this->app->form_validation_lib->set_rules('address', 'ที่อยู่', 'required');
        $this->app->form_validation_lib->set_rules('email', 'อีเมล์', 'required');

        $this->app->form_validation_lib->set_rules('restaurant_name', 'ชื่อร้านอาหาร', 'required');
        $this->app->form_validation_lib->set_rules('restaurant_type_id', 'ประเภทร้านอาหาร', 'required');
        $this->app->form_validation_lib->set_rules('restaurant_address', 'ที่อยู่ร้านอาหาร', 'required');

        // run validation
        if ($this->app->form_validation_lib->run()) {
            if ($this->app->staff_profile_lib->save($profile_data)) {
                $this->app->form_validation_lib->set_message('success', 'บันทึกข้อมูลเรียบร้อย');
            }
        }

        $data = [];
        $data['title'] = 'แก้ไขข้อมูลส่วนตัว - ระบบสั่งอาหารออนไลน์';
        $data['profile'] = $this->app->profile_lib->get_profile();
        $data['restaurant_types'] = $this->app->staff_profile_lib->get_restaurant_types();

        $this->app->view('header', $data);
        $this->app->view('nav', $data);
        $this->app->view('staff/profile/profile', $data);
        $this->app->view('footer');
    }
}
