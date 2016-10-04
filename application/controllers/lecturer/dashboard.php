<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

		if($this->session->userdata('staff_is_logged_in')=='')
		{
		$this->session->set_flashdata('msg','Please Login to Continue');
		redirect('login');
		}

   
    }

    Public function index()
    {
        $this->load->view('lecturer/header');
        $this->load->view('lecturer/footer');
    	$this->load->view('lecturer/dashboard');
    }
    
}
