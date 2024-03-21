<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register_c extends CI_Controller
{
    private $template = 'pages/auth_template_v';
    private $register_page = 'pages/register_v';

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('user_m');
    }

    public function register_view()
    {
        $data = [
            'title' => 'Register Page',
            'content' => $this->register_page,
        ];

        $this->load->view($this->template, $data);
    }

    public function register_user()
    {
        $this->form_validation->set_rules('first-name', 'First name', 'trim|required');
        $this->form_validation->set_rules('last-name', 'Last name', 'trim|required');
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', [
            'valid_email' => 'Please enter a valid email address'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|regex_match[/[A-Z]/]|regex_match[/[0-9]/]', [
            'min_length' => 'Password must be at least 8 characters',
           'regex_match' => 'Password must contain at least one number and one uppercase letter'
        ]);
        $this->form_validation->set_rules('confirm-password', 'Confirm password', 'required|matches[password]', [
            'matches' => "Password don't match"
        ]);
        $this->form_validation->set_message('required', '{field} is required.');

        if ($this->form_validation->run() == FALSE)
        {
            $this->register_view();
        }
        else {
            $data = [
                'CHR_FIRST_NAME' => $this->input->post('first-name'),
                'CHR_LAST_NAME' => $this->input->post('last-name'),
                'CHR_USERNAME' => $this->input->post('username'),
                'CHR_PASSWORD' => $this->input->post('password'),
                'CHR_EMAIL' => $this->input->post('email'),
            ];
            $this->user_m->register_user($data);
            $this->session->set_flashdata('message_success', 'You have successfully registered');
            redirect('login_c/login_view');
        }
    }
}