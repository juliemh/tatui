<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class Getdata extends REST_Controller 
{
	
	function __construct()
    	{
        parent::__construct();
  		$this->load->model('api_db_tasks');
    	}

	public function courses_get() 
		{
		$courseArray = $this->api_db_tasks->getCourses();
		
        $this->response(array($courseArray), 200);
        }	
	
	public function subjects_get() 
		{
		$subjectArray = $this->api_db_tasks->getSubjects();
        $this->response(array($subjectArray), 200);
        }	
	
	public function projects_get() 
		{
		$projectArray = $this->api_db_tasks->getProjects();
        $this->response(array($projectArray), 200);
        }	
	
	public function projectSkills_get() 
		{
		$projectSkills = $this->api_db_tasks->getProjectSkills();
		$this->response(array($projectSkills), 200);
		}
		
	public function students_get() 
		{
		$students = $this->api_db_tasks->getStudents();
		$this->response(array($students), 200);
		}
		
	public function studentSkills_get() 
		{
		$projectSkills = $this->api_db_tasks->getStudentsSkills();
		$this->response(array($projectSkills), 200);
		}
}

?>