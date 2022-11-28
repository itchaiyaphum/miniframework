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
            $this->app->profile_lib->save($profile_form);
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

    public function password()
    {
        // get data from profile_form
        $profile_form = $this->app->input->post();

        // set rules for validation data
        $this->app->form_validation->set_rules('current_password', 'รหัสผ่านเดิม', 'required');
        $this->app->form_validation->set_rules('new_password', 'รหัสผ่านใหม่', 'required');
        $this->app->form_validation->set_rules('confirm_new_password', 'ยืนยันรหัสผ่านใหม่', 'required');

        // run validation
        if ($this->app->form_validation->run()) {
            if ($this->app->profile_lib->change_password($profile_form)) {
                $this->app->form_validation->set_message('success', 'บันทึกข้อมูลเรียบร้อย');
            }
        }

        // get current login user profile data
        $profile = $this->app->profile_lib->get_profile();

        $data = [];
        $data['title'] = 'เปลี่ยนรหัสผ่าน - ระบบสั่งอาหารออนไลน์';
        $data['profile'] = $profile;
        $data['active_menu'] = 'settings_password';
        $data['left_menu'] = $this->app->view('settings/menu', $data, true);

        $this->app->view('header', $data);
        $this->app->view('nav', $data);
        $this->app->view('settings/password', $data);
        $this->app->view('footer');
    }
}
