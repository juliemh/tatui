<?php

class Skillselection extends CI_Controller {


    public function __construct() {
        parent::__construct();
        //This is the model for Adding a Project Task//
        $this->load->model('Skillselection_model');
        $this->load->helper(array('form', 'url', 'html'));
        $this->load->library('form_validation');
    }

    public function call_page($data) {
        // page data to be passed will be usertype by default
        $usertype = 'admin';
        $this->load->view('templates/header', $data);
        $this->load->view('pages/' . $usertype . '/nav');
        $this->load->view('templates/content');
        $this->load->view('templates/footer');
    }

    public function index() {
        $usertype = 'admin';
        if ($this->Skillselection_model->chkempty()) {
            $data = array(
                'page_title' => 'Select Skills',
                'title' => $usertype,
                'message' => '',
                'includes' => 'pages/' . $usertype . '/skillselection'
            );
            $data['skills'] = $this->Skillselection_model->getSkills();
            $this->call_page($data);
        } else {
            $data = array(
                'page_title' => 'Select Skills',
                'title' => $usertype,
                'message' => '',
                'includes' => 'pages/' . $usertype . '/skillselection_error'
            );
            $this->call_page($data);
        }
    }

    public function skillvalidate() {
        foreach($this->input->post('skillcheck') as $key=>$value)
        {
            echo "Index {$key}'s value is {$value}.";
            echo "Level is ".$this->input->post($value);
        }
    }

}
