<?php

class Model_adding_project extends CI_Model {

    // Iterate through the courses table and add the courseid
    // to an array
    function getCourses() {
        $this->db->from('course');
        $this->db->order_by('course_id');
        $result = $this->db->get();
        $drop = array();
        if ($result->num_rows() > 0) {
            foreach ($result->result_array() as $row) {
                $drop[$row['course_id']] = $row['course_id'];
            }
            $finalDropDown = array_merge(array('' => 'Please Select'), $drop);
        }

        return $finalDropDown;
        // return $drop;
    }

   function getSubjectsByCourse($course = string) {
        $this->db->select('subject_id');
        $this->db->where('course_id', $course);
        $query = $this->db->get('course_subject');
        return $query;
    }

    function getAllLecturer() {
        $query = $this->db->query('select a.user_id, a.firstname, a.lastname from user a, access_type b where b.access_type = "lecturer" and a.user_id = b.user_id');

        if ($query->result()) {

            return $query->result();
        }
    }

    //To get all Skills//
    function getSkills() {

        $this->db->select('skill_id');
        $this->db->from('skill_dictionary');
        $query = $this->db->get();

        if ($query->result_array()) {
            return $query->result_array();
        } else {
            return FALSE;
        }
    }

    function add_project($data) {

        $this->db->insert('project', $data);
        return TRUE;
    }

    function add_project_skills($data) {
        if ($this->db->insert('project_skills', $data)) {
            return TRUE;
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

    function validateProj($projectid) {
        $this->db->select('project_id');
        $this->db->where('project_id', $projectid);
        $query = $this->db->get('project');

        if ($query->result_array()) {

            return TRUE;
        } else {
            return FALSE;
        }
    }

    function validateProjCourse($projectid, $courseid) {
        $this->db->select('project_id, course_id');
        $this->db->where(array('project_id' => $projectid, ' course_id' => $courseid));
        $query = $this->db->get('project');

        if ($query->result_array()) {

            return TRUE;
        } else {
            return FALSE;
        }
    }

    function validateThree($projectid, $courseid, $subjectid) {
        $this->db->select('project_id, course_id, subject_id');
        $this->db->where(array('project_id' => $projectid, ' course_id' => $courseid, 'subject_id' => $subjectid));
        $query = $this->db->get('project');

        if ($query->result_array()) {

            return TRUE;
        } else {
            return FALSE;
        }
    }

     function validateThreeskills($projectid, $skillid, $level) {
        $this->db->select('project_id, skill_id, skill_level');
        $this->db->where(array('project_id' => $projectid, ' skill_id' => $skillid, 'skill_level' => $level));
        $query = $this->db->get('project_skills');

        if ($query->result_array()) {

            return TRUE;
        } else {
            return FALSE;
        }
    }
    
     function validateTwoSkills($projectid, $skillid) {
        $this->db->select('project_id, skill_id');
        $this->db->where(array('project_id' => $projectid, ' skill_id' => $skillid));
        $query = $this->db->get('project_skills');

        if ($query->result_array()) {

            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    function getUserType($userid)
    {
        $this->db->select('access_type');
        $this->db->from('access_type');
        $this->db->where('user_id', $userid);
        $this->db->limit(1);
        $query = $this->db->get();
        if($query->num_rows() > 0)
        {
            $row = $query->row();
         return $row->access_type;
        }
    }
}
