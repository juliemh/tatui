<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Addsubject extends CI_Controller {

    public function __construct() {
        parent::__construct();
        //This is the model for Adding a Project Task//
        $this->load->helper(array('form', 'url', 'html'));
        $this->load->library('form_validation');
        //  
        $this->load->model('Addsubject_model');
    }

    public function call_page($data) {
        $usertype = 'admin';
        // page data to be passed will be usertype by default

        $this->load->view('templates/header', $data);
        $this->load->view('pages/' . $usertype . '/nav');
        $this->load->view('templates/content');
        $this->load->view('templates/footer');
    }

    function index() {
        $data['course'] = $this->Addsubject_model->getCourses();
        $usertype = 'admin';
        if (!$this->Addsubject_model->chkempty()) {
            $data = array(
                'page_title' => 'Add Subject',
                'title' => $usertype,
                'message' => '',
                'includes' => 'pages/' . $usertype . '/addsubject_nocourse'
            );
            $this->call_page($data);
            $this->session->set_flashdata('msg', 'Please add some courses first');
            //   redirect ( 'admin' );
        } else {
            $data = array(
                'page_title' => 'Add Subject',
                'title' => $usertype,
                'message' => '',
                'includes' => 'pages/' . $usertype . '/addsubject'
            );
            $data['course'] = $this->Addsubject_model->getCourses();

            $this->form_validation->set_rules('course', 'course', 'callback_validate_dropdown');
            $this->call_page($data);
        }
    }

    function validate() {
        $subjectid = $this->input->post('subjectid');
        $subjectname = $this->input->post('subjectname');
        $description = $this->input->post('description');
        $courseid = $this->input->post('course');
        $is_valid = $this->Addsubject_model->validate($subjectid, $courseid);
          if (!$is_valid)/* If not valid then the subject and course combination doesn't exist */ {
            $data = array(
                'subject_id' => $subjectid,
                'subject_name' => $subjectname,
                'subject_description' => $description,
            );
            $this->Addsubject_model->add_subject($data);

            $data1 = array(
                'course_id' => $courseid,
                'subject_id' => $subjectid
            );

            $this->Addsubject_model->add_subjectcourse($data1);
            $this->session->set_flashdata('msg', 'The subject ' . $subjectid . ' was successfully added');
            redirect('addsubject');
        } else { // course already exists 
            $this->session->set_flashdata('msg1', 'This Subject and Course combination already exists');
            redirect('addsubject');
        }
    }

}
