<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Runalgorithm extends CI_Controller {

    public function __construct() {
        parent::__construct();
        //This is the model for Adding a Project Task//
        $this->load->helper(array('form', 'url', 'html'));
        $this->load->model('Runalgorithm_model');
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
        $data['course'] = $this->Runalgorithm_model->getCourses();
        $usertype = 'admin';
        $data = array(
            'page_title' => 'Run Algorithm',
            'title' => $usertype,
            'message' => '',
            'includes' => 'pages/' . $usertype . '/runalgorithm'
        );
        $data['course'] = $this->Runalgorithm_model->getCourses();
        $data['semester'] = $this->Runalgorithm_model->getSemesters();
        $this->call_page($data);
    }

    public function getSubjects() {

        //set selected country id from POST
        $courseid = $this->input->post('course', TRUE);
        echo $courseid;

        //run the query for the cities we specified earlier
        $subjectData['subjects'] = $this->Runalgorithm_model->getSubjectsByCourse($courseid);

        $output = null;

        foreach ($subjectData['subjects']->result() as $row) {
            //here we build a dropdown item line for each query result
            $output .= "<option value='" . $row->subject_id . "'>" . $row->subject_id . "</option>";
        }

        echo $output;
    }

}
