<?php  defined ( 'BASEPATH' ) OR exit ( 'No direct script access allowed' );

class Addcourse extends CI_Controller {
	public function __construct() {
		parent::__construct ();
		
		$this->load->model ( 'addcourse_model' );
	}
	public function construct_pages($page, $data) {	       
          $this->load->view('templates/header', $data);
          $this->load->view('pages/'.$page);
		  $this->load->view('templates/footer');
	  }
          
          //teest//
	function index() {
            $display = 'addcourse';
		 $data = array(
             'page_title' => 'Admin Add Course',
             'title' => 'Add Course',
            
          );
          $this->construct_pages($display, $data);
	}
	

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
                  
                   $this->session->set_flashdata ('msg', 'The course '.$courseid. ' was successfully added');
               	 redirect( 'addcourse');
                 }
                else // course already exists 
                {	
			$this->session->set_flashdata ( 'msg', 'This Course already exists' );
			redirect ( 'addcourse' );
		}
	}
	
}
