<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manageusers extends CI_Controller {

    public function __construct() {
        parent::__construct();    
        $this->load->helper(array('form', 'url'));
        $this->load->model('get_user');

    }
   //
    public function call_page($users, $message) {
        $usertype = 'admin';
        // page data to be passed will be usertype by default
        $data = array(
            'page_title' => '',
            'title' => '',
            'message' => $message,
            'users' => $users,
            'includes' => 'pages/'. $usertype .'/manage_users'
        );
        $this->load->view('templates/header', $data);
        $this->load->view('pages/' . $usertype . '/nav');
        $this->load->view('templates/content');
        $this->load->view('templates/footer');
    }
    // set the input validation rules for the adduser form
    function set_rules() {
     $this->load->library('form_validation');
        //
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[user.user_id]');
        $this->form_validation->set_rules('firstname', 'Firstname', 'trim|required');
        $this->form_validation->set_rules('lastname', 'Lastname', 'trim|required');
        $this->form_validation->set_rules('access', 'Access', 'trim|required|in_list[student,lecturer,admin]');
        $this->form_validation->set_rules('gender', 'Gender', 'trim|required|in_list[m,f]');
    }
    //
    // add a new user
    //
    public function add_user() {
    // setup validation
       $this->set_rules();
        // run validation
       if ($this->form_validation->run() == FALSE)
                {
                      // get users 
                      $users = $this->get_user->get_all_users();
                      $message = '';
                      $this->call_page($users, $message);
                }
                else
                {
                    // set the user                  
                    $userdata = array(
                        'user_id' =>  $this->input->post('email') ,
                        'password' => 'password',
                        'firstname' => $this->input->post('firstname'),
                        'lastname' => $this->input->post('lastname'),
                        'gender' =>  $this->input->post('gender'),
                        'location' => 'location'
                    ); 
                    $this->get_user->insert_user('user', $userdata);
                    // set access level
                    $new_id = $this->input->post('email');
                    $new_access_type =  $this->input->post('access') ;
                    //insert to database
                    $this->get_user->insert_access($new_id, $new_access_type);
                    // call page again
                    $users = $this->get_user->get_all_users();
                    $message = 'New user added';
                    // clear any saved data in post
                    $this->set_rules();
                    // call page after successful user add
                    $this->call_page($users, $message);
                }
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
               $this->call_page($users, $message);
          }
    }
   
}
