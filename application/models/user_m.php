<?php

class user_m extends CI_Model {
    function __construct() {
        parent::__construct();
    }

    private $tm_user = 'TM_USER';
    private $tt_task = 'TT_TASK';
    private $tm_country = 'TM_COUNTRY';

    function register_user($data)
    {
        $this->db->insert($this->tm_user, $data);
    }
    
    function authenticate($username)
    {
        $check = $this->db->get_where($this->tm_user, ['CHR_USERNAME' => $username])->row();
        return $check;
    }

    function get_user_data($id)
    {
        $check = $this->db->get_where($this->tm_user, ['INT_USER_ID' => $id])->row();
        return $check;
    }

    function get_user_task($id)
    {
        $tasks = $this->db->select('*')
        ->from($this->tt_task)
        ->where('INT_USER_ID', $id)
        ->order_by('CHR_MODIFIED_DATE', 'DESC')
        ->get()
        ->result();
        return $tasks;
    }

    function save_task($data)
    {
        $this->db->insert($this->tt_task, $data);
    }

    function delete_task($id)
    {
        $this->db->delete($this->tt_task, ['INT_TASK_ID' => $id]);
    }

    function update_stage_task($id)
    {
        $this->db->where(['INT_TASK_ID' => $id])
         ->set('CHR_STATUS', 'CHR_STATUS + 1', FALSE)
         ->update($this->tt_task);
    }

    function get_tasks_status_count($id)
    {
        $tasks = $this->get_user_task($id);
    
        $data = [
            'new' => 0,
            'progress' => 0,
            'completed' => 0,
        ];
        
        $statusArray = array_column($tasks, 'CHR_STATUS');
        
        $statusCounts = array_count_values($statusArray);
        
        foreach ($statusCounts as $status => $count) {
            switch ($status) {
                case 0:
                    $data['new'] = $count;
                    break;
                case 1:
                    $data['progress'] = $count;
                    break;
                case 2:
                    $data['completed'] = $count;
                    break;
            }
        }
        
        return $data;
    }

    public function get_all_country()
    {
        $data = $this->db->get($this->tm_country)->result_array();
        return $data;
    }

    public function get_country($country_id)
    {
        $data = $this->db->get_where($this->tm_country, ['CHR_COUNTRY_ID' => $country_id])->row_array();
        return $data;
    }

    public function update_user($id, $data)
    {
        $this->db->where(['INT_USER_ID' => $id])
         ->update($this->tm_user, $data);
    }
}
    