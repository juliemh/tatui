<?php

class Addsemester extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url', 'html', 'inflector', 'date'));
        $this->load->library(array('session', 'form_validation'));
        $this->load->model('Addsemester_model');
    }

    //Johns Contruct Pages Code//
    public function call_page($data) {
        $usertype = 'admin';
        $this->load->view('templates/header', $data);
        $this->load->view('pages/' . $usertype . '/nav');
        $this->load->view('templates/content');
        $this->load->view('templates/footer');
    }

    function index() {
        $usertype = 'admin';
       
            $data = array(
                'page_title' => 'Add Semester',
                'title' => $usertype,
                'message' => '',
                'includes' => 'pages/' . $usertype . '/addsemester'
            );
            $this->call_page($data);
       }

    public function validate() {
        //Variables for Adding a Project//  
        $semesterid = $this->input->post('semester');
        $startDate = @date('Y-m-d', @strtotime($this->input->post('startdate')));
        $finishDate = @date('Y-m-d', @strtotime($this->input->post('finishdate')));
        $addedMsg = array();
        $msgError = array();

        $formdata = array(
            'semester_id' => $semesterid,
            'start_date' => $startDate,
            'finish_date' => $finishDate,
            );
        if ($finishDate <= $startDate)
 {
    $this->session->set_flashdata('msg1', 'Finish date must be after the start date');
            redirect('addsemester');
 }
      if ($this->Addsemester_model->validateSem($semesterid)) {
            $this->session->set_flashdata('msg1', 'This semester ' . $semesterid . '  already exists');
            redirect('addsemester');
        } 
                $semester = array(
                    'semester_id' => $semesterid,
                    'start' => $startDate,
                    'finish' => $finishDate
                );
                if ($this->Addsemester_model->add_semester($semester)) {
                    $msg = 'Added the semester ' . $semesterid;
                    array_push($addedMsg, $msg);                   
                } else {
                    $msg1 = 'Unable to add the semester ' . $semesterid;
                    array_push($addedMsg, $msg);  
                }
                   
            $data['addedMsg'] = $addedMsg;
            $data['msgError'] = $msgError;
            $this->session->set_flashdata($data);
            redirect('addsemester');
    }

 

}
