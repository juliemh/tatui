<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Addcourse extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('Addcourse_model');
    }

    public function call_page() {
        $usertype = 'admin';
        // page data to be passed will be usertype by default
        $data = array(
            'page_title' => 'Add Course',
            'title' => $usertype,
            'message' => '',
            'includes' => 'pages/' . $usertype . '/addcourse'
        );
        $this->load->view('templates/header', $data);
        $this->load->view('pages/' . $usertype . '/nav');
        $this->load->view('templates/content');
        $this->load->view('templates/footer');
    }

    function index() {
        $this->call_page();
    }

    function validate() {
        $courseid = strtoupper($this->input->post('courseid'));
        $coursename = $this->input->post('coursename');
        $description = $this->input->post('description');

        $is_valid = $this->Addcourse_model->validate($courseid);

        if (!$is_valid)/* If not valid then the course doesn't exist */ {
            $data = array(
                'course_id' => $courseid,
                'course_name' => $coursename,
                'course_description' => $description
            );
            $this->Addcourse_model->add_course($data);

            $this->session->set_flashdata('msg', 'The course ' . $courseid . ' was successfully added');
            redirect('addcourse');
        } else { // course already exists 
            $this->session->set_flashdata('msg1', 'This Course already exists');
            redirect('addcourse');
        }
    }
   
}
