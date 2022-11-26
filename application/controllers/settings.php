<?php

class Settings extends Controller
{
    public function profile()
    {
        // get data from profile_form
        $profile_form = $this->app->input->post();

        // set rules for validation data
        $this->app->form_validation->set_rules('firstname', 'ชื่อ', 'required');
        $this->app->form_validation->set_rules('lastname', 'นามสกุล', 'required');
        $this->app->form_validation->set_rules('email', 'อีเมล์', 'required');
        $this->app->form_validation->set_rules('address', 'ที่อยู่', 'required');
        $this->app->form_validation->set_rules('province_id', 'จังหวัด', 'required');
        $this->app->form_validation->set_rules('zip_code', 'รหัสไปรษณีย์', 'required');
        $this->app->form_validation->set_rules('mobile_no', 'เบอร์โทรศัพท์', 'required');

        // run validation
        if ($this->app->form_validation->run()) {
            $this->app->profile_lib->edit($profile_form);
            $this->app->form_validation->set_message('success', 'บันทึกข้อมูลเรียบร้อย');
        }

        // get current login user profile data
        $profile = $this->app->profile_lib->get_profile();
        $provinces = $this->app->province_lib->get_items();

        $data = [];
        $data['title'] = 'แก้ไขข้อมูลส่วนตัว - ระบบสั่งอาหารออนไลน์';
        $data['profile'] = $profile;
        $data['provinces'] = $provinces;
        $data['active_menu'] = 'settings_profile';
        $data['left_menu'] = $this->app->view('settings/menu', $data, true);

        $this->app->view('header', $data);
        $this->app->view('nav', $data);
        $this->app->view('settings/profile', $data);
        $this->app->view('footer');
    }
}
