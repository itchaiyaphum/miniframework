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
        $email = $this->app->input_lib->get_post('email', '');
        $password = $this->app->input_lib->get_post('password', '');

        // set rules for validation data
        $this->app->form_validation_lib->set_rules('email', 'อีเมล์', 'required');
        $this->app->form_validation_lib->set_rules('password', 'รหัสผ่าน', 'required');

        // run validation
        if ($this->app->form_validation_lib->run()) {
            // check login
            if ($this->app->auth_lib->login($email, $password)) {
                if ($this->app->session_lib->get('user_type') == 'admin') {
                    redirect('/admin.php');

                    return true;
                } elseif ($this->app->session_lib->get('user_type') == 'customer') {
                    redirect('/customer.php');

                    return true;
                } elseif ($this->app->session_lib->get('user_type') == 'rider') {
                    redirect('/rider.php');

                    return true;
                } elseif ($this->app->session_lib->get('user_type') == 'staff') {
                    redirect('/staff.php');

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
        $register_data = $this->app->input_lib->post();

        $firstname = $this->app->input_lib->post('firstname');
        $lastname = $this->app->input_lib->post('lastname');
        $user_type = $this->app->input_lib->post('user_type');
        $email = $this->app->input_lib->post('email');
        $password = $this->app->input_lib->post('password');
        $confirm_password = $this->app->input_lib->post('confirm_password');

        // set rules for validation data
        $this->app->form_validation_lib->set_rules('firstname', 'ชื่อ', 'required');
        $this->app->form_validation_lib->set_rules('lastname', 'นามสกุล', 'required');
        $this->app->form_validation_lib->set_rules('user_type', 'ประเภทผู้ใช้งาน', 'required');
        $this->app->form_validation_lib->set_rules('email', 'อีเมล์', 'required');
        $this->app->form_validation_lib->set_rules('password', 'รหัสผ่าน', 'required');
        $this->app->form_validation_lib->set_rules('confirm_password', 'ยืนยันรหัสผ่าน', 'required');

        if ($password != $confirm_password) {
            $this->app->form_validation_lib->set_error('รหัสผ่าน และ ยืนยันรหัสผ่านไม่ตรงกัน, กรุณาลองใหม่อีกครั้ง!');
        } else {
            // run validation
            if ($this->app->form_validation_lib->run()) {
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
