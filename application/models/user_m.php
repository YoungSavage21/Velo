<?php

class User_m extends CI_Model {
    function __construct() {
        parent::__construct();
    }

    private $tm_user = 'tm_user';
    private $tt_task = 'tt_task';
    private $tm_country = 'tm_country';
    private $tt_col = 'tt_collaborate';

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
        $tasks = $this->db->query("
        SELECT *
        FROM (
            SELECT `tt_task`.*, GROUP_CONCAT(`tt_collaborate`.`INT_USER_ID` ORDER BY `tt_collaborate`.`INT_ID` ASC) AS `COL_ID`
            FROM `tt_collaborate`
            JOIN `tt_task` ON `tt_task`.`INT_TASK_ID` = `tt_collaborate`.`INT_TASK_ID`
            GROUP BY `tt_collaborate`.`INT_TASK_ID`
        ) AS subquery
        WHERE FIND_IN_SET($id, `COL_ID`)
        ORDER BY CHR_MODIFIED_DATE DESC
        ")->result();

        return $tasks;
    }

    function save_task($data, $assigned)
    {
        $this->db->insert($this->tt_task, $data);
        $id = $this->db->insert_id();
        
        foreach ($assigned as $key) {
            $this->db->insert($this->tt_col, ['INT_TASK_ID' => $id, 'INT_USER_ID' => $key]);
        }
    }

    function update_task($data, $assigned, $id)
    {
        $this->db->where(['INT_TASK_ID' => $id])
        ->update($this->tt_task, $data);
        $this->db->where(['INT_TASK_ID' => $id])
        ->delete($this->tt_col);

        foreach ($assigned as $key) {
            $this->db->insert($this->tt_col, ['INT_TASK_ID' => $id, 'INT_USER_ID' => $key]);
        }
    }

    function delete_task($task_id, $user_id)
    {
        $query = $this->db->select('INT_USER_ID')
        ->from($this->tt_task)
        ->where('INT_TASK_ID', $task_id)
        ->get()
        ->row();

        if ($query->INT_USER_ID == $user_id) {
            return 0;
            $this->db->delete($this->tt_task, ['INT_TASK_ID' => $task_id]);
        } else {
            return 1;
        }
    }

    function update_stage_task($id)
    {
        $this->db->where(['INT_TASK_ID' => $id])
         ->set('CHR_STATUS', 'CHR_STATUS + 1', FALSE)
         ->update($this->tt_task);
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

    public function update_user_pic($id, $data)
    {
        $this->db->set($data)
         ->where(['INT_USER_ID' => $id])
         ->update($this->tm_user);
    }

    public function edit_status($id, $target)
    {
        $this->db->where(['INT_TASK_ID' => $id])
        ->update($this->tt_task, ['CHR_STATUS' => $target]);
    }

    public function get_image_by_id($id)
    {
        $image = $this->db->select('CHR_IMAGE')
        ->from($this->tt_task)
        ->where('INT_TASK_ID', $id)
        ->get()
        ->row();
        return $image;
    }

    function get_user_info($id)
    {
        $query = $this->db->select('INT_USER_ID, CHR_PROFILE_PIC, CHR_FIRST_NAME')
        ->from($this->tm_user)
        ->where('INT_USER_ID', $id)
        ->get()
        ->row();
        return $query;
    }

    function get_data_by_username($username)
    {
        $query = $this->db->select('*')
        ->from($this->tm_user)
        ->where('CHR_USERNAME', $username)
        ->get()
        ->row();
        return $query;
    }

    function get_task_by_id($id)
    {
        $query = $this->db->select('*')
        ->from($this->tt_task)
        ->where('INT_TASK_ID', $id)
        ->get()
        ->row();
        return $query;
    }

    function get_tasks_status_count($id)
    {
        $tasks = $this->get_user_task($id);
    
        $data = [
            'new' => 0,
            'progress' => 0,
            'review' => 0,
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
                    $data['review'] = $count;
                    break;
                case 3:
                    $data['completed'] = $count;
                    break;
            }
        }
        $total = array_sum($data);
        $data['total'] = $total;
        $data['uncompleted'] = $total - $data['completed'];
        return $data;
    }
}
    