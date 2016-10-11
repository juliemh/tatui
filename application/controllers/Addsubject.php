<?php if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );

class Addsubject extends CI_Controller {


    public function __construct() {
		parent::__construct ();
		 $this->load->helper(array('form', 'url', 'html'));
                 $this->load->library('form_validation');
              //   $this->load->database();
		 $this->load->model ( 'addsubject_model' );
                 
	}
	/*
	 * Showing Login page here
	 */
	function index() {
        
            $data['courses'] = $this->addsubject_model->getCourses();
            $this->load->view ( 'templates/header' );
            $this->load->view ( 'pages/admin/navigation');
            $this->load->view ( 'pages/admin/addsubject', $data  );
            $this->load->view ('templates/footer');
            $this->form_validation->set_rules('courses', 'Courses', 'callback_validate_dropdown');    
	}

	function validate() {
            $message = "";
            $subjectid = $this->input->post ( 'subjectid' );
            $description = $this->input->post ( 'description' );
            $courseid = $this->input->post ( 'courseid');

            $is_valid = $this->addsubject_model->validate ($subjectid, $courseid );
		
		if (!$is_valid)/*If not valid then the course doesn't exist */
                {
                    $data = array(
                    'SubjectID' => $subjectid,
                    'SubjectDesc' => $description,
                    'CourseID' => $courseid
                );
                    $this->session->set_flashdata('msg', "The subject was successfully added" );
                   redirect( 'addsubject');
                  
               			}
                else // course already exists 
                {	
                   $this->session->set_flashdata ( 'msg', 'This Subject and Course combination already exists' );
			redirect ( 'addsubject' );
		}
	}
	
}