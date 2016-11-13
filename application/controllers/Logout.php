<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Logout extends CI_Controller
{
 function __construct()
    {
        parent::__construct();
     
    }
    
          
public function index() {
   $this->session->unset_userdata('user');
   $this->session->sess_destroy();
   $this->load->view('pages/logout');
   }
}