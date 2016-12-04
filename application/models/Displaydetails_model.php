<?php

class Displaydetails_model extends CI_Model {
    /* Check if the course exists */

    function getData($user) {
        $this->db->select('firstname, lastname, gender');
        $this->db->from('user');
        $this->db->where('user_id', $user);
         $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        }
        else
        {
            return FALSE;
        }
    }

    function userEnrolled($user)
    {
        $this->db->select('*');
        
        $this->db->from('course_student');
        $this->db->where('user_id', $user);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    
    function checkUserCourse($user) {
        
        $this->db->select('a.course_id, b.course_name, b.course_description');
        $this->db->from('course_student  a, course  b');
        $this->db->where('a.user_id', $user);
        $this->db->where('a.course_id = b.course_id');
       $query = $this->db->get();
       
        if($query->num_rows() > 0)
        {
            $results = $query->result();
            
            return $results;
        }
        else
        {
            return FALSE;
        }
      
    }  

    
     function getSubjects($user) {
        $this->db->select('a.subject_id, a.semester_id, a.subject_mark, b.subject_name, b.subject_description');
        $this->db->from('subject_student a, subject b');
        $this->db->where('a.user_id', $user);
        $this->db->where('a.subject_id = b.subject_id');
        $query = $this->db->get();
         if($query->num_rows() > 0)
        {
            $results = $query->result();
            return $results;
        }
        else
        {
            return FALSE;
        }
       }

        function getSkills($user) {
        $this->db->select('*');
        $this->db->from('student_skill');
        $this->db->where('user_id', $user);
        $query = $this->db->get();
        if($query->num_rows() > 0)
        {
            $results = $query->result();
            return $results;
        }
        else
        {
            return FALSE;
        }
       }
}
