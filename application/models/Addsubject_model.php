<?php

class Addsubject_model extends CI_Model {

    //Check if the database is empty
    function chkempty() {
        $query = $this->db->query('SELECT COUNT(*) FROM course');
        if ($query->result()) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function getCourses() {
        $this->db->from('course');
        $this->db->order_by('course_id');
        $result = $this->db->get();
        $drop = array();
        if ($result->num_rows() > 0) {
            foreach ($result->result_array() as $row) {
                $drop[$row['course_id']] = $row['course_id'];
            }
            return $drop;
        } else {
            return FALSE;
        }
    }

    function validate($subjectid, $courseid) {
         $this->db->select('subject_id');
        $this->db->where('course_id', $courseid);
        $query = $this->db->get('course_subject');
                
                
        if ($query->result()) {
            foreach ($query->result_array() as $row) {
                if ($row['subject_id'] == $subjectid) {
                    return true;
                }
            }
        }

        return false;
    }

    function add_subject($data) {
        $this->db->insert('subject', $data);
    }

    function add_subjectcourse($data1) {
        $this->db->insert('course_subject', $data1);
    }

}
