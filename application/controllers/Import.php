<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Import extends CI_Controller {
    public function __construct() {
        parent::__construct();    
        $this->load->helper(array('form', 'url'));
        $this->load->model('data_driver');
        $this->load->model('get_user');
        $this->load->helper('directory');
        $this->load->library('email');
    }
   //
    public function call_page($tables, $files, $message) {
        $usertype = 'admin';
        // page data to be passed will be usertype by default
        $data = array(
            'page_title' => 'Import Data',
            'title' => $usertype,
            'message' => $message,
            'tables' => $tables,
            'files' => $files,
            'includes' => 'pages/'.$usertype.'/import_data_file'
        );
        $this->load->view('templates/header', $data);
        $this->load->view('pages/' . $usertype . '/nav');
        $this->load->view('templates/content');
        $this->load->view('templates/footer');
    }
    //
    // send mail
    //
    public function send_password_reset_mail($user_id, $password){
       
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
    public function generate_new_password() {
      // all users added with "password" will be automatically sent a welcome message
      // and new password
      $resetpassword = 'password';    
         // get users
          $user_list = $this->get_user->get_all_users();
          // go through users 
          foreach($user_list as $user) {
              // check if password is "password"
              $user_id = $user->user_id;
              if ($this->get_user->check_password($user_id, $resetpassword) == 1)   {
                  // generate simple random password
                  $newpassword = uniqid();
                  // write new password to database
                  $data = array(
                    'password' => $newpassword
                  );
                  $this->get_user->update('user_id', $user_id, $data);
                  // email user new password  
                  $this->send_password_reset_mail($user_id, $newpassword);
              }
            
           }
    
    }
    //
    // load database table
    //
    public function load_table_names() {
    // this should reflect a list of tables in the database
         $tables = array(
            'default' => 'Select Table',
            'user' => 'Students',
            'subject_student'    => 'Student Subjects',
          ); 
     return $tables;  
    }
    //
    // load file data
    //
    public function read_text($filename) {
       // loads file contents 
       $textarray = file('/var/lib/mysql-files/uploads/'.$filename);
       return $textarray;
    }
    //
    // iterate through users and if no role exists then set to none
    //
    public function check_access_type() {
    // get users
    $user_list = $this->get_user->get_all_users();
          // check user is in access table
          foreach($user_list as $user) {
              // check if user exists
              $user_access = $this->get_user->user_level($user->user_id);
              // inserts new user into table
              if ($user_access == NULL && $user_access == '') {
                   $this->get_user->insert_access($user->user_id);
              }  
              // generates new password if default value of 'password' is found
              $this->generate_new_password();                      
          }
    }
    //
    // checks that the table column count matches the data
    //
    public function check_import_match($table_name, $text_line) {
    $error = 0;
    $arr = explode(",",$text_line);
    $string_count = sizeof($arr);
    $cols = $this->data_driver->get_column_count($table_name);
     if ($cols != FALSE) {
        $col_count = sizeof($cols);
        }
     else
        {
        $error = "Table name doesn't exist";
        return $error;
      }
     if ($string_count == $col_count) {
         return $error;
        }
     else
        {     
          $error = "Column count does not match. Check selection or data format";
          return $error;
        }
    }    
    //
    // read a text file and load the database
    //
    public function process_file() {
          //
          $done = false;
          $error = '';
          //
          $filelist = directory_map('/var/lib/mysql-files/uploads/', 1);
          //
          // returns the table selected in the drop down
          //
          $table_name = $this->input->post('tablename');
          //
          // returns the array position of the selected item on the 
          // dropdown list
          $fileno = $this->input->post('filename');
          //
          // get text as an array of strings, the dropdown returns a number
          //
          $textarray = $this->read_text($filelist[$fileno]);
          //
          // gets the first line of the text file
          //
          $text_line = $textarray[0];
          //
          $return_value = $this->check_import_match($table_name, $text_line);
          //
          // get list of table columns
          //
          $filepath = '/var/lib/mysql-files/uploads/'.$filelist[$fileno];
          // 
          // loads a list of table names into an array
          //
          $tables = $this->load_table_names();
          // send back to import page with message
          if ($return_value === 0) {                   
                $this->data_driver->load_data($table_name, $filepath);
                //
                $message = 'Your data has been successfully imported';
                // this checks that new users have a role assigned
                $this->check_access_type();
           }
           else
           {
                $message = $return_value;                  
           }
           // call page
          $this->call_page($tables, $filelist, $message);
    }
    //
    // main function that gets a list of database tables and sends to view
    //
    function index() {
        //
        // initialize email settings
        //
        $config['protocol'] = 'sendmail';
        $config['mailpath'] = '/usr/sbin/sendmail';
        $config['charset'] = 'iso-8859-1';
        $config['mailtype'] = 'html';
        $config['wordwrap'] = TRUE;
         //
        $this->email->initialize($config);
         //
         // gets a list of files in the uploads directory
         //
         $files = directory_map('/var/lib/mysql-files/uploads/', 1);
         //
         // get all the table names from the database
         // $tables = $this->data_driver->get_tables();
         //
         // set tables
         //
         $tables = $this->load_table_names(); 
         //
         // this sends data to the drop down lists
         //
         $message = 'Import Data Utility';
         if ($files == FALSE) {
               echo anchor('pages', 'Home', 'title="Home"');
               echo '<br>';
               echo "There are currently no files in the upload directory";               
          }
          else
          {
               // initial call the the view
               $this->call_page($tables, $files, $message);
          }
    }
   
}
