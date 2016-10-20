<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Getnav { 
	 /* 
	* this will when called take the user from the session data
	* it will then assign the pages the user has access to
	* 
	*/
	public function link_group($user) {
	       // use session id to get current user	       
	       if($user == "admin") {
	      		 $pagelinks = array(
	            	 "importusers",
              	     "displayusers",
	                 "addingproject",
	                 "pagelink4",
	                 "pagelink5"
	              );     
	                
	       }
	       if($user == "lecturer") {
	      		 $pagelinks = array(
	            	 "pagelink1",
              	     "pagelink2",
	                 "pagelink3",
	                 "pagelink4",
	                 "pagelink5"
	              );      
	       }
	       if($user == "student") {
	      		 $pagelinks = array(
	            	 "pagelink1",
              	     "pagelink2",
	                 "pagelink3",
	                 "pagelink4",
	                 "pagelink5"
	              );
       
	       }
       return $pagelinks; 	
	}
	
}