<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manageusers extends CI_Controller {

    public function __construct() {
        parent::__construct();    
        $this->load->helper(array('form', 'url'));
        $this->load->model('get_user');

    }
   //
    public function call_page($users) {
        $usertype = 'admin';
        // page data to be passed will be usertype by default
        $data = array(
            'page_title' => '',
            'title' => '',
            'message' => '',
            'users' => $users,
            'includes' => 'pages/'. $usertype .'/manage_users'
        );
        $this->load->view('templates/header', $data);
        $this->load->view('pages/' . $usertype . '/nav');
        $this->load->view('templates/content');
        $this->load->view('templates/footer');
    }
    //
    // main function that gets a list of database tables and sends to view
    //
    function index() {
        // initiate variables empty to stop error on render
        $message = '';
        $users = '';
        // get users 
        $users = $this->get_user->get_all_users();
        // test if there are users returned
         if ($users == FALSE) {
               echo anchor('pages', 'Home', 'title="Home"');
               echo '<br>';
               echo "There are currently no users in the database";        
          }
         else
          {
               $this->call_page($users);
          }
    }
   
}
