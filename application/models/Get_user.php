<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Get_user extends CI_Model {  

   public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->database();
        }
   // get user name    
   public function get_user($userid) {
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
   // get password
   public function get_password($userid, $password) { 
	   $this -> db -> select('password');
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
   // returns the user access level
   public function user_level($userid) {  
	   $this -> db -> select('access_type');
	   $this -> db -> from('access_type');
	   $this -> db -> where('user_id', $userid);
	   $query = $this -> db -> get();
	   $access = $query->result();
   return ($access[0]->access_type);
   }

}
