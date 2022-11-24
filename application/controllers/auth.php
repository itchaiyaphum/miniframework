<?php

class Auth extends Controller
{
    public function index()
    {
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
}
