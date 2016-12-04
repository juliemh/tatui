<?php

class Addskill_model extends CI_Model {

    /*Check if the course exists*/
   	function validate($skillid)
	{
             $query=$this->db->get_where('skill_dictionary',array('skill_id'=>$skillid)); 
             return $query->result();	
	}

	/* Add course  */
		
	function add_skill($data){
        // Insert into course table
        $this->db->insert('skill_dictionary', $data);
          		
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
