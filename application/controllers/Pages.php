<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller { 

function __construct() { 

		parent::__construct(); 	
						
		$this->load->helper(array('form', 'url', 'html'));
		$this->load->library('form_validation');
		$this->load->model('get_user', '', TRUE);		
	}	
//	
// calls login or page depending on context	
//
	 public function call_page($data, $usertype) {	 	 
          $this->load->view('templates/header', $data);
          if ($usertype != '' && $usertype != NULL) {
              $this->load->view( 'pages/'.$usertype.'/nav');
          }
		  $this->load->view('templates/content');
		  $this->load->view('templates/footer');		  
    } 
//
// set session
//       
public function set_session($userid, $firstname) {
    $sess_data = array(
			 'user' => $userid,
			 'firstname' => $firstname,
			 'logged_in' => TRUE
		 );
		$this->session->set_userdata($sess_data);
}
//
// get user access level from database which is student, lecturer and admin     
//
public function set_user($userid) {		
	    $query = $this->get_user->get_user($userid);
	    $name = $query[0]->firstname;
		$this->set_session($userid, $name);
		 // get user level for page access
		$usertype = $this->get_user->user_level($userid);
		// get nav
	
		// page data to be passed will be usertype by default
		$data = array(
			'page_title' => 'Welcome!',
			'title' => $userid,
			'message' => '',
			'includes' => 'pages/'.$usertype
			   );
		    $this->call_page($data, $usertype);  
}
//
// exit validation only calls the login form
// 
public function exit_validate($message){
       $usertype = '';
       $data = array(
			'page_title' => 'Welcome!',
			'title' => 'Login Page',
			'message' => $message,
			'includes' => 'pages/loginform'
			);
		$this->call_page($data,$usertype);
      }
//      
// initial validation of user import
//      
public function do_validation() {
      // start of validation
	      $userid = $this->input->post('userid');
          $password = $this->input->post('password');
          $this->form_validation->set_rules('userid', 'Userid', 'required|min_length[7]|max_length[32]');
		  $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]|max_length[32]');		 		 
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
		 // checks if password is found
           if ( true == $this->get_user->check_password($userid, $password)) {
		               $this->set_user($userid);
                    }		
           else 
		    {	              
		               $message = "user password not found";
		               $this->exit_validate($message);
		               return false;	               
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
                  $data = array(
                        'page_title' => 'Welcome!',
                        'title' => $usertype,
                        'message' => '',
                        'includes' => 'pages/'.$usertype
                       );
		        $this->call_page($data, $usertype);
         }
         else {
         // if there is no session data then do validation
             $message = '';
             $this->do_validation();
         }         
     }   
}
