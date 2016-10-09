<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller
{
 function __construct()
    {
        parent::__construct();
       
    }
    
    public function construct_pages($page, $data) {	       
          $this->load->view('templates/header', $data);
          $this->load->view($page);
		  $this->load->view('templates/footer');
	  }
          
public function index() {
   $this->session->unset_userdata('user');
   $this->session->sess_destroy();
    $page = 'pages/loginform';
		  $data = array(
             'page_title' => 'Welcome!',
             'title' => 'Login Page',
            // 'message' => 'Please login to access dashboard',
          );
          $this->construct_pages($page, $data);
   }
}