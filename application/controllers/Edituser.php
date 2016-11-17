<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edituser extends CI_Controller {

    public function __construct() {
        parent::__construct();    
        $this->load->helper(array('form', 'url'));
        $this->load->model('get_user');

    }
   //
    public function call_page($userid, $message) {
        $usertype = 'admin';
        // page data to be passed will be usertype by default
        $data = array(
            'page_title' => '',
            'title' => '',
            'message' => $message,
            'user' => $userid,
            'includes' => 'pages/'. $usertype .'/edit_user'
        );
        $this->load->view('templates/header', $data);
        $this->load->view('pages/' . $usertype . '/nav');
        $this->load->view('templates/content');
        $this->load->view('templates/footer');
    }
    //
    // 
    //
    public function update() {
        $access_type = $this->input->post('access_level');
        $user_id = $this->input->post('user');
    //
    $data = array(
        'access_type' => $access_type,
         );
         //
     $this->get_user->update_access($user_id, $data);
     // return to edit user
      $message = 'User details updated';
      $this->call_page($user_id, $message);
    }
    //
    //
    //
    public function index() {    
         $message = '';
         $this->call_page($this->input->post('userid'),$message);
         
    }
   
}
