<?php
defined('BASEPATH') or exit('No direct script access allowed');

class login_c extends CI_Controller
{
    private $template = 'pages/auth_template_v';
    private $login_page = 'pages/login_v';

    function __construct(){
        parent::__construct();
        $this->load->model('user_m');
        $this->load->library('form_validation');
    }

    public function login_view()
    {
        $data = [
            'title' => 'Login Page',
            'content' => $this->login_page,
        ];

        $this->load->view($this->template, $data);
    }

    public function login_user()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_message('required', '{field} is required.');

        $check = $this->user_m->authenticate($username);

        if ($this->form_validation->run() === TRUE)
        {
            $this->session->unset_userdata('message_success');
            $this->session->unset_userdata('message_failed');
            
            switch(true){

                case !$check:
                    $this->session->set_flashdata('message_failed', 'Wrong username!');
                    break;

                case $check->CHR_PASSWORD == $password:
                    $this->session->set_flashdata('message_success', 'Login successful');
                    $this->session->set_userdata([
                        'user-id' => $check->INT_USER_ID,
                        'username' => $check->CHR_USERNAME,
                        'first-name' => $check->CHR_FIRST_NAME,
                        'last-name' => $check->CHR_LAST_NAME,
                    ]);
                    redirect('dashboard_c/home_view');
                    break;
                    
                default:
                    $this->session->set_flashdata('message_failed', 'Wrong username or password!');
                    break;
            }
        }
        $data = [
            'title' => 'Login Page',
            'content' => $this->login_page,
        ];
        $this->load->view($this->template, $data);
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect('login_c/login_view');
    }
}