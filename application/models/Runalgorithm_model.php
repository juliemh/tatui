<?php

class Runalgorithm_model extends CI_Model {

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

    function getSemesters() {
        $this->db->select('semester_id');
        $this->db->from('semester');
        $this->db->order_by('semester_id');
        $result = $this->db->get();
        if ($result->num_rows() > 0) {
            foreach ($result->result_array() as $row) {
                $drop[$row['semester_id']] = $row['semester_id'];
            }
            return $drop;
        } else {
            return FALSE;
        }
    }

    function getSubjectsByCourse($course = string) {
        $this->db->select('subject_id');
        $this->db->where('course_id', $course);
        $query = $this->db->get('course_subject');
        return $query;
    }

}
