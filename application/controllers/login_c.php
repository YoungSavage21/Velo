<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login_c extends CI_Controller
{
    private $template = 'pages/auth_template_v';
    private $login_page = 'pages/login_v';
    private $forgot_password_page = 'pages/forgot_password_v';

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
                    $this->session->set_userdata('user_session', [
                        'user-id' => $check->INT_USER_ID,
                        'username' => $check->CHR_USERNAME,
                        'first-name' => $check->CHR_FIRST_NAME,
                        'last-name' => $check->CHR_LAST_NAME,
                        'email' => $check->CHR_EMAIL,
                        'phone' => $check->CHR_PHONE_NUM,
                        'country' => $check->CHR_COUNTRY,
                        'profile' => $check->CHR_PROFILE_PIC,
                    ]);
                    redirect('dashboard_c/home_view');
                    break;
                    
                default:
                    $this->session->set_flashdata('message_failed', 'Wrong username or password!');
                    break;
            }
        }
        $this->login_view();
    }

    function forgot_password_view()
    {     
        $data = [
            'title' => 'Forgot Password Page',
            'content' => $this->forgot_password_page,
        ];

        $this->load->view($this->template, $data);
    }

    function change_password()  
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', [
            'valid_email' => 'Please enter a valid email address'
        ]);
        
        if ($this->form_validation->run() == FALSE) {
            $this->forgot_password_view();
        } else {
            $email = $this->input->post('email');
            $this->send_email($email);
        }
        var_dump($email);die;
        redirect('login_c/login_view');
    }

    private function send_email($email)
    {
        $config = json_decode(file_get_contents(FCPATH . 'application/controllers/config.json' ), true);
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'gilangp.nurdiansyah@gmail.com',
            'smtp_pass' => $config['smtp_pass'],
            'smtp_port' => 465,
            'mail_type' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n",
        ];

        $this->load->library('email', $config);
        $this->email->initialize($config); 
        
        $this->email->from('gilangp.nurdiansyah@gmail.com', 'Velo');
        $this->email->to($email);
        $this->email->subject('Testing');
        $this->email->message('Hello World');
        if ($this->email->send()) {
            return true;
        } else {
            var_dump($this->email->print_debugger());die;
        }

    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect('login_c/login_view');
    }
}