<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class Users extends REST_Controller 
{
	
	function __construct()
    	{
        parent::__construct();
  //  	$this->users_get();
    	}
	
	
    public function index()
      	{
        echo $this->response(array('test'=> 'test'), 200);
		}
	  
	public function users_get() 
		{
        $this->response(array('test'=> 'My First API'), 200);
        }
	public function abc_get() 
		{
        $this->response(array('test'=> 'My First abc'), 200);
        }
}

?>