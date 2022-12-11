<?php

class Customer_profile extends Controller
{
    public function index()
    {
        // get data from login_form
        $profile_data = $this->app->input_lib->post();

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
        $this->app->form_validation_lib->set_rules('email', 'อีเมล์', 'required');

        // run validation
        if ($this->app->form_validation_lib->run()) {
            if ($this->app->customer_profile_lib->save($profile_data)) {
                $this->app->form_validation_lib->set_message('success', 'บันทึกข้อมูลเรียบร้อย');
            }
        }

        $data = [];
        $data['title'] = 'แก้ไขข้อมูลส่วนตัว - ระบบสั่งอาหารออนไลน์';
        $data['profile'] = $this->app->profile_lib->get_profile();

        $data['firstname'] = $firstname;
        $data['lastname'] = $lastname;
        $data['mobile_no'] = $mobile_no;
        $data['address'] = $address;
        $data['email'] = $email;
        $data['password'] = $password;

        $this->app->view('header', $data);
        $this->app->view('nav', $data);
        $this->app->view('customer/profile/profile', $data);
        $this->app->view('footer');
    }
}
