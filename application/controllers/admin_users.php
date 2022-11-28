<?php

class Admin_users extends Controller
{
    public function __construct($app)
    {
        parent::__construct($app);
        $this->_check_admin();
    }

    public function index()
    {
        $data = [];
        $data['title'] = 'จัดการสมาชิกทั้งหมด - ระบบสั่งอาหารออนไลน์';
        $data['active_menu'] = 'users';
        // $data['pagination'] = $this->app->admin_users_lib->get_pagination();
        $data['items'] = $this->app->admin_users_lib->get_items(['limit' => 10]);
        $data['left_menu'] = $this->app->view('admin/menu', $data, true);

        $this->app->view('header', $data);
        $this->app->view('nav', $data);
        $this->app->view('admin/users/index', $data);
        $this->app->view('footer');
    }

    public function save()
    {
        // get data from profile_form
        $profile_form = $this->app->input->post();
        $id = $this->app->input->get_post('id');

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
            redirect('/admin_users.php');
        }

        $data = [];
        $data['title'] = 'จัดการสมาชิกทั้งหมด [แก้ไข] - ระบบสั่งอาหารออนไลน์';
        $data['active_menu'] = 'users';
        $data['item'] = $this->app->admin_users_lib->get_item($id);
        $data['provinces'] = $this->app->province_lib->get_items();
        $data['left_menu'] = $this->app->view('admin/menu', $data, true);

        $this->app->view('header', $data);
        $this->app->view('nav', $data);
        $this->app->view('admin/users/form', $data);
        $this->app->view('footer');
    }

    public function bypass()
    {
        $id = $this->app->input->get_post('id');
        $this->app->admin_users_lib->bypass_login($id);
        redirect('/');
    }

    public function publish()
    {
        $id = $this->app->input->get_post('id');
        $this->app->admin_users_lib->publish('users', $id);
        redirect('/admin_users.php');
    }

    public function unpublish()
    {
        $id = $this->app->input->get_post('id');
        $this->app->admin_users_lib->unpublish('users', $id);
        redirect('/admin_users.php');
    }

    public function trash()
    {
        $id = $this->app->input->get_post('id');
        $this->app->admin_users_lib->trash('users', $id);
        redirect('/admin_users.php');
    }

    public function restore()
    {
        $id = $this->app->input->get_post('id');
        $this->app->admin_users_lib->restore('users', $id);
        redirect('/admin_users.php');
    }

    public function delete()
    {
        $id = $this->app->input->get_post('id');
        $this->app->admin_users_lib->delete('users', $id);
        redirect('/admin_users.php');
    }
}
