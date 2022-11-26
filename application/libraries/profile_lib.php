<?php

class Profile_lib extends Base_object
{
    public $id = 0;
    public $firstname = '';
    public $lastname = '';
    public $email = '';
    public $address = '';
    public $province_id = 0;
    public $zip_code = '';
    public $mobile_no = '';
    public $type = 'customer';
    public $status = 0;

    public function __construct($app)
    {
        parent::__construct($app);
        $this->get_profile();
    }

    public function is_login()
    {
        return $this->app->auth_lib->is_login();
    }

    public function get_profile($email = null)
    {
        (!empty($email)) or $email = $this->app->session->get('email');

        $query = $this->app->db->query('SELECT * FROM users WHERE email="'.$email.'"');
        $result = $query->row();

        if (!empty($result)) {
            foreach ($result as $key => $val) {
                $this->{$key} = $val;
            }
        }

        return $this;
    }

    public function edit($profile_data = [])
    {
        $thumbnail = '/storage/profiles/no-thumbnail.jpg';

        // preparing data
        $data = [
            'firstname' => $profile_data['firstname'],
            'lastname' => $profile_data['lastname'],
            'email' => $profile_data['email'],
            'address' => $profile_data['address'],
            'zip_code' => $profile_data['zip_code'],
            'province_id' => $profile_data['province_id'],
            'mobile_no' => $profile_data['mobile_no'],
            'thumbnail' => $thumbnail,
            'updated_at' => now(),
        ];

        $where = 'id='.$profile_data['id'];

        // insert register data to database
        return $this->app->db->update('users', $data, $where);
    }

    public function get_user_type()
    {
        return $this->type;
    }
}
