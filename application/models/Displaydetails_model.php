<?php

class Displaydetails_model extends CI_Model {
    /* Check if the course exists */

    function getData($user) {
        $this->db->select('firstname, lastname, gender');
        $this->db->from('user');
        $this->db->where('user_id', $user);
         $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        else
        {
            return FALSE;
        }
    }

    function userEnrolled($user)
    {
        $this->db->select('COUNT(*)');
        
        $this->db->from('course_student');
        $this->db->where('user_id', $user);
        $query = $this->db->get();
        
        $result = $query->row_array();
        $count = $result['COUNT(*)'];
        if ($count > 0) {

            return TRUE;
        } else {

            return FALSE;
        }
    }
    
    
    function checkUserCourse($user) {
        $this->db->select('a.course_id, b.course_description');
        $this->db->from('course_student a, course b');
        $this->db->where('a.user_id',  $user);
        $this->db->where('b.course_id', 'a.course_id');
        $query = $this->db->get();
        return $query;
    }  
    
    function getCourseDescription($course)
    {
        $this->db->select('course_description');
        $this->db->from('course');
        $this->db->where('course_id', $course);
        return $query;
    }
 
 
    
    
    function getSubjects($user) {
        $this->db->select('a.subject_id, a.semester_id, a.subject_mark, b.subject_name');
        $this->db->from('subject_student a, subject b');
        $this->db->where('a.user_id', $user);
        $query = $this->db->get();
       }

}
