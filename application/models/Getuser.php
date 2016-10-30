<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Getuser extends CI_Model {
   
   // get user name    
   public function getuserid($userid) {
   
	   $this -> db -> select('user_id');
	   $this -> db -> from('user');
	   $this -> db -> where('user_id', $userid);
	   $this -> db -> limit(1);
 
   $query = $this -> db -> get();
 
   if($query -> num_rows() == 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
   }
   
  
  
   
    public function getfirst($userid) {
   
	   $this -> db -> select('firstname');
	   $this -> db -> from('Users');
	   $this -> db -> where('userID', $userid);
	   $this -> db -> limit(1);
 
   $query = $this -> db -> get();
 
   if($query -> num_rows() == 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
   }
   public function getvalidEmail($emailId) {
   
	   $this -> db -> select('email');
	   $this -> db -> from('users');
	   $this -> db -> where('email', $emailId);
	   $this -> db -> limit(1);
 
	   $query = $this -> db -> get();
	
	   if($query -> num_rows() == 1)
	   {
		 return $query->result();
	   }
	   else
	   {
		 return false;
	   }
   }
   
    public function reset_password() {
	   $email = $this->input->post('reset_email'); 	
	   $password = $this->input->post('password');
	   $this -> db -> where('email', $email);
	   $data = array('password'=>$password);
	   $this -> db -> update('Students', $data);
	   return($this->db->affected_rows()>0)?TRUE:FALSE;
   }
   // get password
   public function getuserpassword($password) {
   
	   $this -> db -> select('password');
	   $this -> db -> from('Users');
	   $this -> db -> where('password', $password);
	   $this -> db -> limit(1);
 
   $query = $this -> db -> get();
 
   if($query -> num_rows() == 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
   }
   
 public function auth($password, $user_id) 
	 {
	   
		   $this -> db -> select('password');
		   $this -> db -> from('user');
		   $this -> db -> where('user_id', $user_id);
		
	 
	   $query = $this -> db -> get();
	   $queryRes=$query->result();  
	
		$passCheck=$queryRes[0]->password;
		
	     if ( $passCheck == $password)
		 	{
		 		return true;
		 	}
	   
	   else
		   {
		     return false;
		   }
	   }
   
   
   public function userlevel($userid) {
   
	   $this -> db -> select('Level');
	   $this -> db -> from('Userlevel');
	   $this -> db -> where('userID', $userid);
	   $query = $this -> db -> get();
	   $level = $query->result();

   return ($level[0]->Level);
   }

}