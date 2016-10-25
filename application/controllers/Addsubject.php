<?php  defined ( 'BASEPATH' ) OR exit ( 'No direct script access allowed' );

class Addsubject extends CI_Controller {

    public function __construct() {
		parent::__construct ();		 
		 //This is the model for Adding a Project Task//
		$this->load->helper(array('form', 'url', 'html'));
		$this->load->library('form_validation');
		//  
		$this->load->model('add_subject_model');
                 
	}
	public function call_page() {  
        $usertype = 'admin';
		// page data to be passed will be usertype by default
		$data = array(
			'page_title' => 'Welcome!',
			'title' => $usertype,
			'message' => '',
			'includes' => 'pages/'.$usertype.'/add_subject'
			   );
        $this->load->view('templates/header', $data);
        $this->load->view( 'pages/'.$usertype.'/nav');
		$this->load->view('templates/content');
		$this->load->view('templates/footer');
		
    }
          
	function index() {
            $data['courses'] = $this->add_subject_model->getCourses();
            $this->form_validation->set_rules('courses', 'Courses', 'callback_validate_dropdown'); 
            $this->call_page();   
	}

	function validate() {
            $subjectid = $this->input->post ( 'subjectid' );
            $description = $this->input->post ( 'description' );
            $courseid = $this->input->post ( 'course');
            echo $subjectid.' '.$description.' '.$courseid;

            $is_valid = $this->addsubject_model->validate ($subject_id, $course_id );
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
