<?php  defined ( 'BASEPATH' ) OR exit ( 'No direct script access allowed' );

class Addsubject extends CI_Controller {


    public function __construct() {
		parent::__construct ();
		 $this->load->helper(array('form', 'url', 'html'));
                 $this->load->helper('form');
                 $this->load->library('form_validation');
              //   $this->load->database();
		 $this->load->model ( 'addsubject_model' );
                 
	}
	public function construct_pages($page, $data) {	       
          $this->load->view('templates/header', $data);
          $this->load->view('pages/'.$page);
	  $this->load->view('templates/footer');
	  }
          
	function index() {
        $display = 'addsubject';
        $data = array(
             'page_title' => 'Admin Add Subject',
             'title' => 'Add Subjects'
          );
            $data['courses'] = $this->addsubject_model->getCourses();
           $this->construct_pages($display, $data);
            $this->form_validation->set_rules('courses', 'Courses', 'callback_validate_dropdown');    
	}

	function validate() {
            $subjectid = $this->input->post ( 'subjectid' );
            $description = $this->input->post ( 'description' );
            $courseid = $this->input->post ( 'courses');
            echo $subjectid.' '.$description.' '.$courseid;

            $is_valid = $this->addsubject_model->validate ($subjectid, $courseid );
		echo 'validation';
		if (!$is_valid)/*If not valid then the subject and course combination doesn't exist */
                {
                    $data = array(
                    'SubjectID' => $subjectid,
                    'SubjectDesc' => $description,
                    'CourseID' => $courseid
                );
                    $this->addsubject_model->add_subject ( $data );
                    
                   $this->session->set_flashdata ('msg', 'The subject '.$subjectid. ' was successfully added');
               	 redirect( 'addsubject');
                  
               			}
                else // course already exists 
                {	
                   $this->session->set_flashdata ( 'msg', 'This Subject and Course combination already exists' );
			redirect ( 'addsubject' );
		}
	}
	
}
