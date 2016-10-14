<?php

class Addsubject_model extends CI_Model
{
      
    function getCourses()
    {
        $this->db->from('courses');
        $this->db->order_by('CourseID');
        $result = $this->db->get();
        $drop= array();
        if($result->num_rows()>0) {
            foreach($result->result_array() as $row)
            {
                $drop[$row['CourseID']] = $row['CourseID'];
            }
        }

        return $drop;  
        
          }
    
    function validate($subjectid, $courseid)
	{
        $query=$this->db->get_where('subjects',array('SubjectID'=>$courseid)); 
       
         echo 'validate';
        if($query->result())
        {
           foreach ($query->result_array() as $row)
           {
               if($row->CourseID == $courseid)
               {
                   return true;
                   
               }
           }
           
        }
        
        return false;
        
	}

		
function add_subject($data)
        {
    echo 'add subjed';
        $this->db->insert('subjects', $data);   		
        }
}
