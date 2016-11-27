<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Get_user extends CI_Model {  

   public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->database();
        }
   //
   // get all users
   //
   public function get_all_users() {
       $this -> db -> select('*');
	   $this -> db -> from('user');
	   $query = $this -> db -> get();
   
    if($query -> num_rows() > 0)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
   }
   //
   // get user name  
   //  
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
   //
   // insert user data without needing to define columns
   //
   public function insert_user($table, $data) {
          $this->db->insert($table, $data);
   }
   //
   // $data = array(
   //     'title' => $title,
   //     'name' => $name,
   //     'date' => $date
   //);
   //      UPDATE mytable
   //      SET title = '{$title}', name = '{$name}', date = '{$date}'
   //      WHERE id = $id
   public function update($col, $userid, $data) {
        $this->db->where($col, $userid);
        $this->db->update('user', $data);
   }
   //
   //
   // returns if password is found
   //
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
   //
   // returns the user access level
   //
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
           return NULL;
           }
   }
   //
   // set or change the user access level
   //
   public function insert_access($userid, $type) {   
        $added_by = $this->session->userdata('user');     
       	$data = array(
        'user_id' => $userid,
        'access_type' => $type,
        'added_by_id' => $added_by,
        'date_changed' => ''
          );
        $this->db->insert('access_type', $data);
   }
   //
   // update or set the user level
   //
   public function update_access($userid, $type) {  	   
      $this->db->where('user_id', $userid);
      $this->db->update('access_type', $type);
   }
    // API AUTHENTICATION FUNCTION:
   
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

}
