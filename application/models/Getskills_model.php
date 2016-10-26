<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Getskills_model extends CI_Model {
   
   //    
   public function getskill($skillId) {
   
	   $this -> db -> select('skill_id');
	   $this -> db -> from('skill_dictiionary');
	   $this -> db -> where('skill_id', $skillId);
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

    public function insert_skill($data) {
	   if($data){
	   	$this->db->insert('skill_dictionary', $data);
	   }else{

	   		return false;
	   }
	   
   }
  
   

}