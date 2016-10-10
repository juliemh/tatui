<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //$this->load->library('session');
        $this->load->model('getuser', '', TRUE);
        $this->load->helper(array('form', 'url', 'html'));
        $this->load->library('form_validation');        
    }
     public function construct_pages($page, $data) {	       
          $this->load->view('templates/header', $data);
          $this->load->view('pages/'.$page);
		  $this->load->view('templates/footer');
	  }
    // checks login using in built validation
    public function index()
    {
   
        $message = "";
        $display = 'loginform';
        $this->form_validation->set_rules('userid', 'Userid', 'required|min_length[7]|max_length[7]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
        if ($this->form_validation->run() == FALSE) {
		  $data = array(
             'page_title' => 'Welcome!',
             'title' => 'Login Page',
             'message' => 'Please login to access dashboard',
          );
          $this->construct_pages($display, $data);
        }
        else
        {        
        //Field validation succeeded.  Validate against database
        $userid = $this->input->post('userid');
        $password = $this->input->post('password');
        //query the database to see user exists
        $idresult = $this->getuser->getuserid($userid);
        $passresult = false;
        if ($idresult == false) {
           $message = "An existing user id is needed";
        }
        else 
        {
             $passresult = $this->getuser->getuserpassword($password);
             if ($passresult == false) {
                $message = "A valid password is required";
             }          
        }
        // tests if input is valid and found
        if ( $passresult == true) {
        $sess_data = array(
            'user' => $userid,
            'logged_in' => TRUE
        );
             $this->session->set_userdata($sess_data);
             $display = $this->getuser->userlevel($userid);
             $data = array(
             'page_title' => 'Welcome!',
             'title' => 'Login Page',
             'message' => 'Please login to access dashboard'
          );
           $this->construct_pages($display, $data);
        } 
        else 
        // runs build in validation          
           {
		  $data = array(
             'page_title' => 'Welcome!',
             'title' => 'Login Page',
             'message' => 'Please login to access dashboard',
          );
          $this->construct_pages($display, $data);
        }
        }
        
    }
	public function reset_email_password(){
		
		$this->load->helper('form');
		$this->load->view('pages/reset_email_password');
			
	}
	public function email_reset_password_validation()
	{
		$message2 = "";
		$this->load->library('form_validation');     
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		if($this->form_validation->run()){
			
			 $this->load->model('getuser', '', TRUE);
			 $email = $this->input->post('email');
			 $emailresult = $this->getuser->getvalidEmail($email);
			 if($emailresult){
				 
				$this->load->library('email');
				$this->email->from('testpv1001@gmail.com', 'taitu');
				$this->email->to($this->input->post('email'));
				$this->email->subject('Reset Your Password');
				$message2 = "<p>You are someone requested to change your password</p>";
				$message2.="<a href '".base_url()."reset_password/".$email."'>Click here to reset Your Password</a>";
				$this->email->message($message2);
				if($this->email->send()){
					
					echo 'Kindly check your email  '.$this->input->post('email').' to reset your passwords';
				}
				else{
					
					echo 'Can not send email! kindly contact our customer Services';
					
				}
			 }
			 else{
				 echo  "Please Enter Existing Email Id"; 
			 }
			 
		}
		else{
			
			$this->load->view('pages/reset_email_password');
			
		}
	}
	
	public function reset_password(){
		$this->load->helper('form');
		$this->load->view('pages/reset_password');
	}
	
	public function reset_password_validation(){
		$this->load->library('form_validation');
	    $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
		$this->form_validation->set_rules('confirm_password', 'Confirm_password', 'required|min_length[6]');
		if($this->form_validation->run()){
			
			$this->load->model('getuser', '', TRUE);
			$passwordResult = $this->getuser->reset_password();
			if($passwordResult){
				
				echo "Your Password Updated Successfully";
			}
			else{
				
				echo " Error";
			}
		}
		else{
			echo 'Enter a Valid Password';
			$this->load->view('pages/reset_password');
		}

	}
}
