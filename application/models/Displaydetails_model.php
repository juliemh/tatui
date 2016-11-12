<?php

class Displaydetails_model extends CI_Model {

    /*Check if the course exists*/
   	function getData($user)
	{
             $this->db->select(' a.firstname, a.lastname, a.gender, b.course_id, c.course_id, c.course_description');
             $this->db->from('user a, course_student b, course c');
             $this->db->where('a.user_id',  $user);
             $this->db->where('b.user_id' , $user);
             $this->db->where('c.course_id = b.course_id');
          //   $this->db->where('b.user_id');
             $query=$this->db->get(); 
             
             if($query->num_rows()> 0)
             {
             return $query->result_array();
             }
           }
      
    function getSubjects($user)
    {
        $this->db->select('a.subject_id, a.semester_id, a.subject_mark, b.subject_name');
        $this->db->from('subject_student a, subject b');
        $this->db->where('a.user_id', $user);
        $query= $this->db->get();
        
        if($query->num_rows()> 0)
             {
             return $query->result_array();
             }
    }
		
}
