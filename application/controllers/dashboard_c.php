<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_c extends CI_Controller
{
    private $template = 'dashboard/dash_template_v';
    private $home_page = 'dashboard/home_v';
    private $profile_page = 'dashboard/profile_v';
    private $account_page = 'dashboard/account_settings_v';
    private $security_page = 'dashboard/account_security_v';


    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('user_m');
        
        if (!$this->session->userdata('user_session'))
        {
            redirect('login_c/logout');
        }
    }

    public function home_view()
    {
        $data = [
            'title' => 'Home Page',
            'content' => $this->home_page,
            'session' => $this->session->userdata('user_session'),
        ];
        $this->load->view($this->template, $data);
    }

    public function board_view()
    {
        $session = $this->session->userdata('user_session');
        $data = [
            'title' => 'Board',
            'content' => 'dashboard/board_v',
            'session' => $session,
            'tasks' => $this->user_m->get_user_task($session['user-id']),
            'tasks_status_count' => $this->user_m->get_tasks_status_count($session['user-id'])
        ];
        // var_dump($data['tasks']);die;
        $this->load->view($this->template, $data);
    }

    function process_task($id)
    {
        $tasks = $this->user_m->get_user_task($id);
        $n = 0;
        foreach ($tasks as &$key) {
            $col = explode(',', $key->COL_ID);
            $key->COL_ID = [];
            foreach ($col as $c)
            {
                $key->COL_ID[] = $this->user_m->get_user_info($c);
            }
        }
        return $tasks;
    }

    public function kanban_view()
    {
        date_default_timezone_set("Asia/Jakarta");
        $session = $this->session->userdata('user_session');
        
        $data = [
            'title' => 'Board',
            'content' => 'dashboard/kanban_v',
            'session' => $session,
            'tasks' => $this->process_task($session['user-id']),
        ];
        $this->load->view($this->template, $data);
    }

    public function profile_view()
    {
        $session = $this->session->userdata('user_session');
        $date = new DateTime($this->user_m->get_user_data($session['user-id'])->CHR_DATE_CREATED);
        $data = [
            'title' => 'Profile',
            'content' => $this->profile_page,
            'session' => $session,
            'tasks' => $this->user_m->get_user_task($session['user-id']),
            'tasks_status_count' => $this->user_m->get_tasks_status_count($session['user-id']),
            'joined_date' => $date->format('F Y'),
            'country' => $this->user_m->get_country($session['country']),
        ];
        $this->load->view($this->template, $data);
    }

    public function account_settings_view()
    {
        $data = [
            'title' => 'Settings',
            'content' => $this->account_page,
            'session' => $this->session->userdata('user_session'),
            'all_country' => $this->user_m->get_all_country(),
        ];
        $this->load->view($this->template, $data);
    }

    public function account_security_view()
    {
        $data = [
            'title' => 'Settings',
            'content' => $this->security_page,
            'session' => $this->session->userdata('user_session'),
            'all_country' => $this->user_m->get_all_country(),
        ];
        $this->load->view($this->template, $data);
    }

    public function add_task()
    {
        $data = [
            'CHR_TASK_TITLE' => $this->input->post('task-title'),
            'CHR_TASK_DESC' => $this->input->post('task-desc'),
            'CHR_TASK_CATEGORY' => $this->input->post('task-category'),
            'CHR_TASK_TAG_COLOR' => $this->input->post('task-tag'),
            'CHR_STATUS' => $this->input->post('CHR_STATUS'),
            'INT_USER_ID' => $this->session->userdata('user_session')['user-id'],
            'INT_CREATED_BY' => $this->session->userdata('user_session')['user-id'],
            'DAT_DUE_DATE' => $this->input->post('due-date'),
        ];
        $config['upload_path'] = './assets/img/upload/';
        $config['allowed_types'] = 'jpg|png';
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image')) {
            $file = $this->upload->data();
            $data['CHR_IMAGE'] = $file['file_name'];
        } else {
            $error = $this->upload->display_errors();
            $upload_errors[] = $error;
        }
        $assigned = $this->input->post('assigned');
        // var_dump($data, $assigned);die;
        $this->user_m->save_task($data, $assigned);
        redirect('dashboard_c/kanban_view');
    }
    public function delete_task($id)
    {
        $image = $this->user_m->get_image_by_id($id);
        unlink(FCPATH . 'assets/img/upload/' . $image->CHR_IMAGE);
        $this->user_m->delete_task($id);
        redirect('dashboard_c/kanban_view');
    }

    public function update_stage_task($id)
    {
        $this->user_m->update_stage_task($id);
        redirect('dashboard_c/board_view');
    }

    public function update_user()
    {
        $session = $this->session->userdata('user_session');
        $id = $session['user-id'];
        $data = [
            'INT_USER_ID' => $id,
            'CHR_USERNAME' => $this->input->post('username'),
            'CHR_FIRST_NAME' => $this->input->post('firstName'),
            'CHR_LAST_NAME' => $this->input->post('lastName'),
            'CHR_EMAIL' => $this->input->post('email'),
            'CHR_PHONE_NUM' => $this->input->post('phoneNumber'),
            'CHR_COUNTRY' => $this->input->post('country'),
        ];
        $config['upload_path'] = './assets/img/avatars/';
        $config['allowed_types'] = 'jpg|png';
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('profile-pic')) {
            $file = $this->upload->data();
            if($session['profile'] !== 'default.png')
            {
                unlink(FCPATH . 'assets/img/avatars/' . $session['profile']);
            }
            $data['CHR_PROFILE_PIC'] = $file['file_name'];
        } else {
            $error = $this->upload->display_errors();
            $upload_errors[] = $error;
        }
        $this->user_m->update_user($id, $data);
        $this->update_session($id);
        redirect('/dashboard_c/board_view');
    }

    public function update_session($id)
    {
        $check = $this->user_m->get_user_data($id);
        $this->session->set_userdata('user_session', [
            'user-id' => $check->INT_USER_ID,
            'username' => $check->CHR_USERNAME,
            'first-name' => $check->CHR_FIRST_NAME,
            'last-name' => $check->CHR_LAST_NAME,
            'email' => $check->CHR_EMAIL,
            'phone' => $check->CHR_PHONE_NUM,
            'country' => $check->CHR_COUNTRY,
            'profile' => $check->CHR_PROFILE_PIC
        ]);
    }
    
    public function update_password()
    {
        $current_password = $this->input->post('currentPassword');
        $new_password = $this->input->post('newPassword');
        $confirm_password = $this->input->post('confirmPassword');

        $session = $this->session->userdata('user_session');
        $user_data = $this->user_m->get_user_data($session['user-id']);
        
        $this->load->library('form_validation');
        $this->form_validation->set_rules('currentPassword', 'current password', 'required');
        $this->form_validation->set_rules('newPassword', 'new password', 'trim|required|min_length[8]|regex_match[/[A-Z]/]|regex_match[/[0-9]/]', [
            'min_length' => 'Password must be at least 8 characters',
           'regex_match' => 'Password must contain at least one number and one uppercase letter'
        ]);
        $this->form_validation->set_rules('confirmPassword', 'confirm password', 'required|matches[newPassword]', [
            'matches' => "Password don't match"
        ]);

        if ($this->form_validation->run() == TRUE)
        {
            if ($user_data->CHR_PASSWORD == $new_password) {
                $this->session->set_flashdata('password_failed', "Password can't be the same as previous one!");
                redirect('/dashboard_c/account_security_view');

            } elseif ($user_data->CHR_PASSWORD == $current_password) {
                $data = [
                    'CHR_PASSWORD' => $new_password,
                ];
                $this->user_m->update_user($session['user-id'], $data);
                $this->session->set_flashdata('password_success', "Password changed successfully!");
                redirect('/dashboard_c/account_security_view');
                
            } else {
                $this->session->set_flashdata('password_failed', "Current password is incorrect. Please try again!");
                redirect('/dashboard_c/account_security_view');

            }
        } else {
            $data = [
                'title' => 'Settings',
                'content' => $this->security_page,
                'session' => $this->session->userdata('user_session'),
                'all_country' => $this->user_m->get_all_country(),
            ];
            $this->load->view($this->template, $data);
        }

    }

    public function edit_status()
    {
        $id = $this->input->post('id');
        $target = $this->input->post('target');

        $this->user_m->edit_status($id, $target);
    }

    public function add_member()
    {
        $username = $this->input->post('username');
        $data = $this->user_m->get_data_by_username($username);
        echo json_encode($data);
    }
}