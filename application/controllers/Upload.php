<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends CI_Controller {

    public function __construct() {
        parent::__construct();    
        $this->load->helper(array('form', 'url'));
        $this->load->model('get_user');
    }

    public function call_page($message) {
        $usertype = 'admin';
        // page data to be passed will be usertype by default
        $data = array(
            'page_title' => 'Import Data',
            'title' => $usertype,
            'message' => $message,
            'includes' => 'pages/' . $usertype . '/upload_file'
        );
        $this->load->view('templates/header', $data);
        $this->load->view('pages/' . $usertype . '/nav');
        $this->load->view('templates/content');
        $this->load->view('templates/footer');
    }
    //
    function index() {
        $message = '';
        $this->call_page($message);
        
    }
    // uploads file to the folder
    public function do_upload() {
        $config['upload_path']          = '/var/lib/mysql-files/uploads/';
        $config['allowed_types']        = 'txt|csv';
        $config['max_size']             = 1000;

        $this->load->library('upload', $config);

        if ( !$this->upload->do_upload('userfile'))
            {
                // will display the file upload form again
                $this->call_page($this->upload->display_errors());
                        
            }
        else
            {
               $message = "File uploaded successfully!";
               $this->call_page($message);
            }
        }    
  
   
}
