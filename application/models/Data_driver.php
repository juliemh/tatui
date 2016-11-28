<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_driver extends CI_Model {  

   public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->database();
                
        }
//
// get a list of tables
//
   public function get_tables() {
        $table_list = $this->db->list_tables();
        return $table_list;
   }
// 
// load data from comma delimited file
//
public function load_data($tablename, $data) {
if ($sql = "LOAD DATA LOCAL INFILE '".$data."' IGNORE INTO TABLE ".$tablename." FIELDS TERMINATED BY ','")
   {
   $this->db->query($sql);
   return TRUE;
   }
   else
   {
   return FALSE;
   }
}   
//
// return column names
//
public function get_column_count($tablename) {
         if($this->db->table_exists($tablename)) {
                  return $this->db->list_fields($tablename);
                  }
                  else {
                  return FALSE;
            }
 }
        
}
