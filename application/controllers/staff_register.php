<?php

class Staff_register extends Base_app
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

        $restaurant_name = $this->app->input_lib->get_post('restaurant_name', '');
        $restaurant_type_id = $this->app->input_lib->get_post('restaurant_type_id', 0);
        $restaurant_address = $this->app->input_lib->get_post('restaurant_address', '');

        // set rules for validation data
        $this->app->form_validation_lib->set_rules('firstname', 'ชื่อ', 'required');
        $this->app->form_validation_lib->set_rules('lastname', 'นามสกุล', 'required');
        $this->app->form_validation_lib->set_rules('mobile_no', 'เบอร์โทร', 'required');
        $this->app->form_validation_lib->set_rules('address', 'ที่อยู่', 'required');
        $this->app->form_validation_lib->set_rules('thumbnail', 'รูปภาพประจำตัว', 'required');
        $this->app->form_validation_lib->set_rules('email', 'อีเมล์', 'required');
        $this->app->form_validation_lib->set_rules('password', 'รหัสผ่าน', 'required');

        $this->app->form_validation_lib->set_rules('restaurant_name', 'ชื่อร้านอาหาร', 'required');
        $this->app->form_validation_lib->set_rules('restaurant_type_id', 'ประเภทร้านอาหาร', 'required');
        $this->app->form_validation_lib->set_rules('restaurant_address', 'ที่อยู่ร้านอาหาร', 'required');

        // run validation
        if ($this->app->form_validation_lib->run()) {
            if ($this->app->staff_profile_lib->register($register_data)) {
                redirect('/rider_register.php?action=register_completed');
            }
        }

        $data = [];
        $data['title'] = 'ลงทะเบียนสำหรับผู้ดูแลร้านอาหาร - ระบบสั่งอาหารออนไลน์';
        $data['restaurant_types'] = $this->app->staff_profile_lib->get_restaurant_types();

        $data['firstname'] = $firstname;
        $data['lastname'] = $lastname;
        $data['mobile_no'] = $mobile_no;
        $data['address'] = $address;
        $data['email'] = $email;
        $data['password'] = $password;
        $data['restaurant_name'] = $restaurant_name;
        $data['restaurant_type_id'] = $restaurant_type_id;
        $data['restaurant_address'] = $restaurant_address;

        $this->app->view('header', $data);
        $this->app->view('nav', $data);
        $this->app->view('staff/profile/register', $data);
        $this->app->view('footer');
    }

    public function register_completed()
    {
        $data = [];
        $data['title'] = 'ลงทะเบียนสำหรับผู้ดูแลร้านอาหาร เรียบร้อยแล้ว - ระบบสั่งอาหารออนไลน์';

        $this->app->view('header', $data);
        $this->app->view('nav', $data);
        $this->app->view('staff/profile/register_completed', $data);
        $this->app->view('footer');
    }
}
