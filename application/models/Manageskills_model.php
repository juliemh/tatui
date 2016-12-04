<?php

class Manageskills_model extends CI_Model {

    // Iterate through the courses table and add the courseid
    // to an array
    public function getUserSkills($user) {

        $query = $this->db->query("select a.skill_id, b.skilllevel from skill_dictionary as a
    left join student_skill as b on b.skill_id = a.skill_id and b.user_id = '$user'");

        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            return $result;
        } else {
            return FALSE;
        }
    }

    //To get all Skills//
    function getAllSkills() {
        $this->db->select('skill_id');
        $this->db->order_by('skill_id');
        $this->db->from('skill_dictionary');
        $query = $this->db->get();

        if ($query->num_rows() > 0) {

            $result = $query->result_array();
            return $result;
        } else {
            return FALSE;
        }
    }

    //Check if the database is empty
    function chkempty($table) {
        $this->db->select('COUNT(*)');
        $query = $this->db->get($table);
        $result = $query->row_array();
        $count = $result['COUNT(*)'];
        if ($count > 0) {

            return TRUE;
        } else {

            return FALSE;
        }
    }

    function chkUserHasSkills($user) {
        $this->db->select('user_id');
        $this->db->from('student_skill');
        $this->db->where('user_id', $user);
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function updateSkills($data) {
        foreach ($data as $row => $value) {
            $user = $data['user_id'];
            $skill = $data['skill_id'];
            $level = $data['skilllevel'];
            $udata = array(
                'user_id' => $user,
                'skill_id' => $skill,
                'skilllevel' => $level
            );
            $this->db->select('skilllevel');
            $query = $this->db->get_where('student_skill', array('user_id' => $user, 'skill_id' => $skill));

            if ($query->num_rows() > 0) {
                $result = $query->result();   
                if ($result == $level) {
                    
                } else if ($result != $level) {
                    $this->db->set('skilllevel', $level);
                    $this->db->where(array('user_id' => $user, 'skill_id' => $skill));
                    $this->db->update('student_skill');
                }
            } else {
                $this->db->insert('student_skill', $udata);
            }
        }
    }

    function deleteSkills($deleteSkill) {

        $this->db->delete('student_skill', array('user_id' => $deleteSkill['user_id'], 'skill_id' => $deleteSkill['skill_id']));
    }

}
