<?php

class Addcourse_model extends CI_Model {

    /*Check if the course exists*/
   	function validate($courseid)
	{
             $query=$this->db->get_where('course',array('course_id'=>$courseid)); 
             return $query->result();	
	}

	/* Add course  */
		
	function add_course($data){
        // Insert into course table
        $this->db->insert('courses', $data);
          		
        }		
}
