<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Password extends CI_Controller {

    public function __construct() {
        parent::__construct();    
        $this->load->helper(array('form', 'url', 'html'));
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
    // send mail
    //
    public function send_password_mail($user_id, $password){
       
        $from = 'admin@localhost';
        
        $this->email->set_header('MIME-Version', '1.0; charset=utf-8');
        $this->email->set_header('Content-type', 'text/html');
        $this->email->from($from, 'System Generated');
        $this->email->to($user_id);
 
        $this->email->subject('You have now been added to the Team Allocation tool.');
        $data = array(
            'title' => 'Team Allocation Tool',
            'email' => $user_id,
            'password' => $password
        );
        $body = $this->load->view('pages/admin/new_user_email_message',$data,TRUE);
        $this->email->message($body);
        $this->email->send();  
        
    }
  //
    // generate new user emails - checks for generic password
    //
    public function change_password() {
  
              // user id from view
              $user_id = $this->input->post('user_id');
             
                  // generate simple random password
                  $newpassword = uniqid();
                  // write new password to database
                  $data = array(
                    'password' => $newpassword
                  );
                  $this->get_user->update('user_id', $user_id, $data);
                  // email user new password  
                  $this->send_password_mail($user_id, $newpassword);
                  $message = 'Password changed';
                  $this->call_page($user_id, $message);
            
           }
    
}