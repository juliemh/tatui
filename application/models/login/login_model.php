<?php

class Login_model extends CI_Model {

    /**
    * Validate the login's data with the database
    * @param string $email
    * @param string $password
    * @return void
    */

    /*Check Login*/
   	function validate($email, $password)
	{
		$this->db->where('Password', $password);
		$this->db->where('Email', $email);
		$query = $this->db->get('users');
		return $query->result();	
	}

	/*Get Session values */
		
	function get_id($email, $password)
	{
		
		$this->db->where('Password', $password);
		$this->db->where('Email', $email);	
		return $this->db->get('users')->result();
				
	}
		
}