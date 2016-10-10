<?php

class Addsubject_model extends CI_Model
{
      
    function getCourses()
    {
        $query = $this->db->get('courses');
        $result = $query->result();

        $courseid = array('-Select One -');
     
        
        for ($i = 0; $i < count($result); $i++)
        {
            array_push($courseid, $result[$i]->CourseID);
        }
        return array($courseid);
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
