<?php

class Auth extends Base_app
{
    private function _check_login()
    {
        $auth = $this->app->library('auth_lib');
        $profile = $this->app->library('profile_lib');

        // if ($auth->is_login()) {
        //     redirect('/');
        // }
    }

    public function index()
    {
        $this->_check_login();

        // get data from login_form
        $email = $this->app->input->get_post('email', '');
        $password = $this->app->input->get_post('password', '');

        // set rules for validation data
        $this->app->form_validation->set_rules('email', 'อีเมล์', 'required');
        $this->app->form_validation->set_rules('password', 'รหัสผ่าน', 'required');

        // run validation
        if ($this->app->form_validation->run()) {
            // check login
            if ($this->app->auth_lib->login($email, $password)) {
                if ($this->app->session->get('user_type') == 'admin') {
                    redirect('/admin.php');

                    return true;
                }
                redirect('/');
            }
        }

        $data = [];
        $data['title'] = 'เข้าสู่ระบบ - ระบบสั่งอาหารออนไลน์';
        $data['email'] = $email;
        $data['password'] = $password;

        $this->app->view('header', $data);
        $this->app->view('auth/index', $data);
        $this->app->view('footer');
    }

    public function logout()
    {
        $this->app->auth_lib->logout();
        redirect('/auth_login.php');
    }

    // @TODO: will delete this function
    public function register()
    {
        $this->_check_login();

        // get data from login_form
        $register_data = $this->app->input->post();

        $firstname = $this->app->input->post('firstname');
        $lastname = $this->app->input->post('lastname');
        $user_type = $this->app->input->post('user_type');
        $email = $this->app->input->post('email');
        $password = $this->app->input->post('password');
        $confirm_password = $this->app->input->post('confirm_password');

        // set rules for validation data
        $this->app->form_validation->set_rules('firstname', 'ชื่อ', 'required');
        $this->app->form_validation->set_rules('lastname', 'นามสกุล', 'required');
        $this->app->form_validation->set_rules('user_type', 'ประเภทผู้ใช้งาน', 'required');
        $this->app->form_validation->set_rules('email', 'อีเมล์', 'required');
        $this->app->form_validation->set_rules('password', 'รหัสผ่าน', 'required');
        $this->app->form_validation->set_rules('confirm_password', 'ยืนยันรหัสผ่าน', 'required');

        if ($password != $confirm_password) {
            $this->app->form_validation->set_error('รหัสผ่าน และ ยืนยันรหัสผ่านไม่ตรงกัน, กรุณาลองใหม่อีกครั้ง!');
        } else {
            // run validation
            if ($this->app->form_validation->run()) {
                // check login
                if ($this->app->auth_lib->register($register_data)) {
                    redirect('/auth_register_completed.php');
                }
            }
        }

        $data = [];
        $data['title'] = 'ลงทะเบียนใหม่ - ระบบสั่งอาหารออนไลน์';
        $data['firstname'] = $firstname;
        $data['lastname'] = $lastname;
        $data['user_type'] = $user_type;
        $data['email'] = $email;
        $data['password'] = $password;
        $data['confirm_password'] = $confirm_password;

        $this->app->view('header', $data);
        $this->app->view('auth/register', $data);
        $this->app->view('footer');
    }

    // @TODO: will delete this function
    public function register_completed()
    {
        $this->_check_login();

        $data = [];
        $data['title'] = 'ลงทะเบียนใหม่ สำเร็จเรียบร้อยแล้ว - ระบบสั่งอาหารออนไลน์';

        $this->app->view('header', $data);
        $this->app->view('auth/register_completed', $data);
        $this->app->view('footer');
    }
}
