<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller { 

function __construct() { 

		parent::__construct(); 	
						
		$CI =& get_instance();
		$CI->load->helper(array('form', 'url', 'html'));
		$CI->load->library('form_validation');
		$CI->load->model('getuser', '', TRUE);		
		$this->load->library('getnav');	
	}	
// calls login or page depending on context	
	 public function call_page($data, $nav) {
	 	 
          $this->load->view('templates/header', $data);
          if ($nav != '') {
              $this->load->view('templates/nav', $nav);
          }
		 $this->load->view('templates/content');
		  $this->load->view('templates/footer');		  
    } 
//
// set session
//       
public function set_session($userid) {
    $sess_data = array(
			 'user' => $userid,
			 'logged_in' => TRUE
		 );
		$this->session->set_userdata($sess_data);
}
//
// get user access level from database which is student, lecturer and admin     
//
public function set_user($userid) {		
		$this->set_session($userid);
		 // get user level for page access
		$usertype = $this->get_user->user_level($userid);
		// get nav
		$links = $this->getnav->link_group($usertype); 
		// set the navigation links data
		$nav = array(
			'links' => $links,
			'page' => 'pages/nav'	            
		);
		// page data to be passed will be usertype by default
		$data = array(
			'page_title' => 'Welcome!',
			'title' => $usertype,
			'message' => '',
			'includes' => 'pages/'.$usertype
			   );
		$this->call_page($data, $nav);  
}
//
// exit validation only calls the login form
// 
public function exit_validate($message){
       $nav = '';
       $data = array(
			'page_title' => 'Welcome!',
			'title' => 'Login Page',
			'message' => $message,
			'includes' => 'pages/loginform'
			);
		$this->call_page($data,$nav);
      }
//      
// initial validation of user import
//      
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
             $links = $this->getnav->link_group($usertype); 
		            $nav = array(
		                'links' => $links,
                        'page' => 'pages/nav'	            
		            );
                  $data = array(
                        'page_title' => 'Welcome!',
                        'title' => $usertype,
                        'message' => '',
                        'includes' => 'pages/'.$usertype
                       );
		        $this->call_page($data, $nav);
         }
         else {
         // if there is no session data then do validation
             $message = '';
             $this->do_validation();
         }         
     }   
}