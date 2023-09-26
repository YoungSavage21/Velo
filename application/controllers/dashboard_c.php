<?php
defined('BASEPATH') or exit('No direct script access allowed');

class dashboard_c extends CI_Controller
{
    private $template = 'dashboard/dash_template_v';
    private $home_page = 'dashboard/home_v';


    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('user_m');
        
        if (!$this->session->userdata('user-id'))
        {
            redirect('login_c/logout');
        }
    }

    public function home_view()
    {
        $data = [
            'title' => 'Home Page',
            'content' => $this->home_page,
            'session' => $this->session->all_userdata(),
        ];
        $this->load->view($this->template, $data);
    }

    public function board_view()
    {
        $data = [
            'title' => 'Board',
            'content' => 'dashboard/board_v',
            'session' => $this->session->all_userdata(),
            'tasks' => $this->user_m->get_user_task($this->session->userdata('user-id')),
            'tasks_status_count' => $this->user_m->get_tasks_status_count($this->session->userdata('user-id'))
        ];
        // var_dump(count($data['tasks']));
        // var_dump($data['tasks_status_count']['completed']);
        // var_dump(round($data['tasks_status_count']['completed']/count($data['tasks'])));die;
        $this->load->view($this->template, $data);
    }

    public function add_task()
    {
        $data = [
            'CHR_TASK_TITLE' => $this->input->post('task-title'),
            'CHR_TASK_DESC' => $this->input->post('task-desc'),
            'CHR_TASK_CATEGORY' => $this->input->post('task-category'),
            'CHR_TASK_TAG_COLOR' => $this->input->post('task-tag'),
            'INT_USER_ID' => $this->session->userdata('user-id'),
        ];
        $this->user_m->save_task($data);
        redirect('dashboard_c/board_view');
    }
    public function delete_task($id)
    {
        $this->user_m->delete_task($id);
        redirect('dashboard_c/board_view');
    }

    public function update_stage_task($id)
    {
        $this->user_m->update_stage_task($id);
        redirect('dashboard_c/board_view');
    }
}