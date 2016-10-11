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
        
        $sql = "select * subjects where subjectid = ? and courseid = ?;";
    $query = $this->db->query($sql, array($subjectid, $courseid));
             return $query->result();	
	}

		
	function add_subject($data)
        {
        $this->db->insert('subjects', $data);   		
        }
}