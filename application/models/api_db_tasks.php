<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class api_db_tasks extends CI_Model {  


 public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->database();
        }
 

  function getCourses() 
  		{
        $query = $this->db->query('SELECT * FROM course');
        return $query->result();
    	}  
  
    function getSubjects() {
         $query = $this->db->query('SELECT * FROM `subject`');
		 return $query->result();
       }
	
	 function getProjects() 
	 	{
         $query = $this->db->query('SELECT * FROM `project`');

		 return $query->result();
       }

	function getProjectSkills()
		{
			$query = $this->db->query('SELECT * FROM `project_skills`');
			return $query->result();
		}        
        
		
	function getStudents()
		{
		$query = $this->db->query('SELECT * FROM `access_type` WHERE `access_type` = "student"');
		return $query->result();
		}

function getStudentsSkills()
		{
		$query = $this->db->query('SELECT * FROM `student_skill`');
		return $query->result();
		}

}
