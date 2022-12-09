<?php

class Pages extends Base_app
{
    public function homepage()
    {
        $data = [];
        $data['title'] = 'หน้าหลัก / ระบบสั่งอาหารออนไลน์';
        $data['active_menu'] = 'homepage';

        $this->app->view('header', $data);
        $this->app->view('nav', $data);
        $this->app->view('pages/homepage', $data);
        $this->app->view('footer');
    }

    public function about()
    {
        $data = [];
        $data['title'] = 'เกี่ยวกับเรา / ระบบสั่งอาหารออนไลน์';
        $data['active_menu'] = 'about';

        $this->app->view('header', $data);
        $this->app->view('nav', $data);
        $this->app->view('pages/about', $data);
        $this->app->view('footer');
    }
}
