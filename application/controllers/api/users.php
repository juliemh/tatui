<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class Users extends REST_Controller 
{
	
	function __construct()
    	{
        parent::__construct();
  
    	}
	
	
    public function index()
      	{
        echo $this->response(array('test'=> 'test'), 200);
		}
	  
	public function users_get() 
		{
        $this->response(array('test'=> 'My First API'), 200);
        }
	public function loginUser_get() 
		{
			
		$email=$this->input->get('email');
		$password=$this->input->get('password');
		
		
		$this->load->model('Get_user');
		
		$exists=$this->Get_user->get_user($email);
		
		if ($exists != false)
			{
			$passok = $this->Get_user->auth($password, $email);
			}
		else
			{
			$passok=false;
			}
		
        $this->response( $passok, 200);
		
        }
}

?>