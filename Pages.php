<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pages extends CI_Controller { 

function __construct() { 
		parent::__construct(); 
		$this->load->database();
		$this->load->helper(array('form', 'url', 'html'));
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('get_user', '', TRUE);
	}	
// calls login or page depending on context	
	 public function call_page($data) {     
          $this->load->view('templates/header', $data);
		  $this->load->view('templates/content');
		  $this->load->view('templates/footer');

    }
//
// get user access level from database which is student, lecturer and admin     
//
public function set_user($userid) {
		            $sess_data = array(
                         'user' => $userid,
                         'logged_in' => TRUE
                     );
                    $this->session->set_userdata($sess_data);
                     // get user level for page access
		            $usertype = $this->get_user->user_level($userid);
		            $header = array(
                        'page_title' => 'Welcome!',
                        'title' => 'Login Page',
                        'message' => '',
                        'includes' => 'pages/'.$usertype
                       );
		            $this->call_page($header);  
     }
//
// exit valication
// 
public function exit_validate($message){
       $data = array(
			'page_title' => 'Welcome!',
			'title' => 'Login Page',
			'message' => $message,
			'includes' => 'pages/loginform'
			);
		$this->call_page($data);
      }
      
public function do_validation() {
      // start of validation
	      $userid = $this->input->post('userid');
          $password = $this->input->post('password');
          $this->form_validation->set_rules('userid', 'Userid', 'required|min_length[7]|max_length[7]');
		  $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
		 		 
		 // basic validation
		  if ($this->form_validation->run() == false) {
		            $message = "";
		            $this->exit_validate($message);	
		            return false;
		      }
	      // get user
		   if ($this->get_user->get_user($userid) == false){		          
		               $message = "user not found";
                       $this->exit_validate($message);
                       return false;
           }
		      //
           if ( ($this->get_user->get_password($userid, $password)) == false ) {
		               $message = "user password not found";
		               $this->exit_validate($message);
		               return false;
                    }		
           else 
		    {	              
		               $this->set_user($userid);
		    } 


}
//
// main routine that runs the form validation
//
public function index() {
          // see if user is set and take straight to their page
         $user = $this->session->userdata('user');
         if (isset($user)) {          
            $usertype = $this->get_user->user_level($user);
            $content =  'pages/'.$usertype;
         }
         else {
             $this->session->sess_destroy();
             $message = '';
             $this->do_validation();
         }  
        
       }   
}