<?php

class Displaydetails extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url', 'html'));
        $this->load->model('Displaydetails_model');
    }

    public function call_page($data) {
        $usertype = 'student';
        $this->load->view('templates/header', $data);
        $this->load->view('pages/' . $usertype . '/nav');
        $this->load->view('templates/content');
        $this->load->view('templates/footer');
    }

    function index() {

        $user = $this->session->userdata('user');
        $usertype = 'student';
        $data = array(
            'page_title' => 'Display My Details',
            'title' => $usertype,
            'message' => '',
            'includes' => 'pages/' . $usertype . '/displayDetails'
        );
        $data['details'] = $this->Displaydetails_model->getData($user);
      //  if ($this->Displaydetails_model->userEnrolled($user)) {
            $data['course'] = $this->Displaydetails_model->checkUserCourse($user);
            $data['subjects'] = $this->Displaydetails_model->getSubjects($user);
            $data['skills'] = $this->Displaydetails_model->getSkills($user);
        //} 
        //else
        //{
        //    $data['course'] = '';
        //    $data['subjects'] = '';
        //
        //}
        //    print_r($data);
        $this->call_page($data);
    }

}
