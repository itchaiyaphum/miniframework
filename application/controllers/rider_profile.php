<?php

class Rider_profile extends Controller
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

        // run validation
        if ($this->app->form_validation_lib->run()) {
            if ($this->app->rider_profile_lib->save($profile_data)) {
                $this->app->form_validation_lib->set_message('success', 'บันทึกข้อมูลเรียบร้อย');
            }
        }

        $data = [];
        $data['title'] = 'แก้ไขข้อมูลส่วนตัว - ระบบสั่งอาหารออนไลน์';
        $data['profile'] = $this->app->profile_lib->get_profile();

        $this->app->view('header', $data);
        $this->app->view('nav', $data);
        $this->app->view('rider/profile/profile', $data);
        $this->app->view('footer');
    }
}
