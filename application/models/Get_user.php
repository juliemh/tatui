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
 	   $this -> db -> select('*');
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
   // returns if password is found
   public function check_password($userid, $password) { 
	   $this -> db -> select('user_id');
	   $this -> db -> from('user');
	   $this -> db -> where('password', $password);
	   $this -> db -> limit(1);
 
   $query = $this -> db -> get();
 
   if($query -> num_rows() == 1)
   {
     return true;
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
	   if ($access != NULL) {
          return ($access[0]->access_type);
          }
       else{
           $access = 'role_not_found';
           return $access;
           }
   }
   // insert user data
   public function insert_data($table_name, $data_in) {
         // inserts and array of strings
         $this->db->insert_string($table_name, $data_in);   
   }
   // update user data
   public function update_data($table_name, $data_in) {
         // updates and array of strings
         $this->db->update_string($table_name, $data_in);   
   }
}