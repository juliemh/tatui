<?php if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );

class Addcourse extends CI_Controller {
	public function __construct() {
		parent::__construct ();
		
		$this->load->model ( 'addcourse_model' );
	}
	/*
	 * Showing Login page here
	 */
	function index() {
		$this->load->view ( 'templates/header' );
                $this->load->view ( 'pages/admin/navigation' );   
                $this->load->view ( 'pages/admin/addcourse' );
                $this->load->view ('templates/footer');
	}
	
	/**
	 * check the username and the password with the database
	 *
	 * @return void
	 */
	function validate() {
		$courseid = $this->input->post ( 'courseid' );
		$description = $this->input->post ( 'description' );

		$is_valid = $this->addcourse_model->validate ($courseid );
		
		if (!$is_valid)/*If not valid then the course doesn't exist */
                {
                    $data = array(
                    'CourseID' => $courseid,
                    'CourseDesc' => $description
                );
                    $this->addcourse_model->add_course ( $data );
                   redirect( 'addcourse');
                   $this->session->set_flashdata ('msg', 'The course '.$courseid. ' was successfully added');
               			}
                else // course already exists 
                {	
			$this->session->set_flashdata ( 'msg', 'This Course already exists' );
			redirect ( 'addcourse' );
		}
	}
	
}