<?php

class Addcourse_model extends CI_Model {

    /**
    * Validate the login's data with the database
    * @param string $email
    * @param string $password
    * @return void
    */

    /*Check Login*/
   	function validate($courseid)
	{
             $query=$this->db->get_where('courses',array('CourseID'=>$courseid)); 
             return $query->result();	
	}

	/*Get Session values */
		
	function add_course($data){
        // Inserting in Table(students) of Database(college)
        $this->db->insert('courses', $data);
          		
        }

		
}