<?php

class Addsubject_model extends CI_Model
{
      
    function getCourses()
    {
        $this->db->from('course');
        $this->db->order_by('course_id');
        $result = $this->db->get();
        $drop= array();
        if($result->num_rows()>0) {
            foreach($result->result_array() as $row)
            {
                $drop[$row['course_id']] = $row['course_id'];
            }
        return $drop;    
        }
        else
        {
         return FALSE; 
        
          }
    }
    
    function validate($subjectid, $courseid)
	{
        $query=$this->db->get_where('subject',array('subject_id'=>$courseid)); 
       
         echo 'validate';
        if($query->result())
        {
           foreach ($query->result_array() as $row)
           {
               if($row->course_id == $courseid)
               {
                   return true;
                   
               }
           }
           
        }
        
        return false;
        
	}

		
function add_subject($data)
        {
        $this->db->insert('subject', $data);   		
        }
        
      function add_subjectcourse ( $data1 )
      {
          $this->db->insert('course_subject', $data1);
      }
}
