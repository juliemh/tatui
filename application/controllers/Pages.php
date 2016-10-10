<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller { 

      function __construct() { 
         parent::__construct(); 
         $this->load->database(); 
      }
    // sets the intial page to login
	  public function index()
	  {
	      $data = array(
             'page_title' => 'Welcome!',
             'title' => 'Login Page',
             'message' => 'Please login to access dashboard'
          );
          $page = 'loginform';
		  $this->construct_pages($page, $data);
	  } 
	  // this is called to specify different pages
	   public function construct_pages($page, $data) {	       
          $this->load->view('templates/header', $data);
          $this->load->view('pages/'.$page);
		  $this->load->view('templates/footer');
	  }
}
