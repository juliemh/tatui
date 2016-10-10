<?php if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );

class Addsubject extends CI_Controller {
	public function __construct() {
		parent::__construct ();
		$this->load->helper(array('form', 'url'));
                 $this->load->library('form_validation');
		 $this->load->model ( 'addsubject_model' );
	}
	/*
	 * Showing Login page here
	 */
	function index() {
		$this->load->view ( 'templates/header' );
                $this->load->view ( 'pages/admin/addsubject' );
                $this->load->view ('templates/footer');
                $this->form_validation->set_rules('courses', 'Courses', 'callback_validate_dropdown');
                $data['courses'] = $this->addsubject_model->getCourses();
	}
	
	/**
	 * check the username and the password with the database
	 *
	 * @return void
	 */
	function validate() {
		$subjectid = $this->input->post ( 'subjectid' );
		$description = $this->input->post ( 'description' );
                $courseid = $this->input->post ( 'courseid');

		$is_valid = $this->addsubject_model->validate ($subjectid, $courseid );
		
		if (!$is_valid)/*If not valid then the course doesn't exist */
                {
                    $data = array(
                    'SubjectID' => $courseid,
                    'SubjectDesc' => $description,
                     'CourseID' => $courseid
                );
                    $this->addsubject_model->add_subject ( $data );
                   redirect( 'addsubject');
                   $this->session->set_flashdata ('msg', 'The subject '.$subjectid. ' was successfully added');
               			}
                else // course already exists 
                {	
			$this->session->set_flashdata ( 'msg1', 'This Subject  and Course combinationalready exists' );
			redirect ( 'addsubject' );
		}
	}
	
}