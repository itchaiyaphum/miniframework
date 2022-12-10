<?php

class Rider_register extends Base_app
{
    public function index()
    {
        // get data from login_form
        $register_data = $this->app->input_lib->post();

        $firstname = $this->app->input_lib->get_post('firstname', '');
        $lastname = $this->app->input_lib->get_post('lastname', '');
        $mobile_no = $this->app->input_lib->get_post('mobile_no', '');
        $address = $this->app->input_lib->get_post('address', '');
        $email = $this->app->input_lib->get_post('email', '');
        $password = $this->app->input_lib->get_post('password', '');

        // set rules for validation data
        $this->app->form_validation_lib->set_rules('firstname', 'ชื่อ', 'required');
        $this->app->form_validation_lib->set_rules('lastname', 'นามสกุล', 'required');
        $this->app->form_validation_lib->set_rules('mobile_no', 'เบอร์โทร', 'required');
        $this->app->form_validation_lib->set_rules('address', 'ที่อยู่', 'required');
        $this->app->form_validation_lib->set_rules('thumbnail', 'รูปภาพประจำตัว', 'required');

        $this->app->form_validation_lib->set_rules('email', 'อีเมล์', 'required');
        $this->app->form_validation_lib->set_rules('password', 'รหัสผ่าน', 'required');

        // run validation
        if ($this->app->form_validation_lib->run()) {
            if ($this->app->rider_profile_lib->register($register_data)) {
                redirect('/rider_register.php?action=register_completed');
            }
        }

        $data = [];
        $data['title'] = 'ลงทะเบียนสำหรับผู้ส่งอาหาร - ระบบสั่งอาหารออนไลน์';

        $data['firstname'] = $firstname;
        $data['lastname'] = $lastname;
        $data['mobile_no'] = $mobile_no;
        $data['address'] = $address;
        $data['email'] = $email;
        $data['password'] = $password;

        $this->app->view('header', $data);
        $this->app->view('nav', $data);
        $this->app->view('rider/profile/register', $data);
        $this->app->view('footer');
    }

    public function register_completed()
    {
        $data = [];
        $data['title'] = 'ลงทะเบียนสำหรับผู้ส่งอาหาร เรียบร้อยแล้ว - ระบบสั่งอาหารออนไลน์';

        $this->app->view('header', $data);
        $this->app->view('nav', $data);
        $this->app->view('rider/profile/register_completed', $data);
        $this->app->view('footer');
    }
}
