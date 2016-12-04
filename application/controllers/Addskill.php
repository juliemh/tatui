<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Addskill extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('Addskill_model');
    }

    public function call_page($usertype) {
          
     
        // page data to be passed will be usertype by default
        $data = array(
            'page_title' => 'Add Skill',
            'title' => $usertype,
            'message' => '',
            'includes' => 'pages/' . $usertype . '/addskill'
        );
        $this->load->view('templates/header', $data);
        $this->load->view('pages/' . $usertype . '/nav');
        $this->load->view('templates/content');
        $this->load->view('templates/footer');
    }

    function index() {
        
        $usertype = $this->Addskill_model->getUserType($this->session->userdata('user'));
        $this->call_page($usertype);
    }

    function validate() {
        $skill = strtoupper($this->input->post('skillid'));
        $category = $this->input->post('category');
        $description = $this->input->post('description');

        $is_valid = $this->Addskill_model->validate($skill);

        if (!$is_valid)/* If not valid then the course doesn't exist */ {
            $data = array(
                'skill_id' => $skill,
                'skill_category' => $category,
                'skill_description' => $description
            );
            $this->Addskill_model->add_skill($data);

            $this->session->set_flashdata('msg', 'The skill ' . $skill . ' was successfully added');
            redirect('addskill', 'refresh');
        } else { 
            $this->session->set_flashdata('msg1', 'This Skill already exists');
            redirect('addskill', 'refresh');
        }
    }
   
}
