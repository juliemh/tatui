<?php

class Manageskills extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url', 'html'));
        $this->load->model('Manageskills_model');
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

        $finalSkills = array();
        $skills = array();
        $usertype = 'student';
        if ($this->Manageskills_model->chkempty('skill_dictionary')) {
            if ($this->Manageskills_model->chkempty('student_skill') && $this->Manageskills_model->chkUserHasSkills($user)) {
                $finalSkills = $this->Manageskills_model->getUserSkills($user);
            } else {
                $skills = $this->Manageskills_model->getAllSkills();
                foreach ($skills as $row) {
                    $finalSkills[] = array(
                        'skill_id' => $row['skill_id'],
                        'skilllevel' => 'none'
                    );
                }
            }

            $data = array(
                'page_title' => 'Manage Your Skills',
                'title' => $usertype,
                'message' => '',
                'includes' => 'pages/' . $usertype . '/manageskills'
            );
            $data['skills'] = $finalSkills;
            $this->call_page($data);
        } else {
            $data = array(
                'page_title' => 'Manage Your Skills',
                'title' => $usertype,
                'message' => '',
                'includes' => 'pages/' . $usertype . '/manageskill_error'
            );
        }
    }

    function validate() {
        $user = $this->session->userdata('user');
        $skillcheck = $this->input->post('skillcheck');
        $addedMsg = array();
        $msgError = array();


        if (count($skillcheck) > 0) {
            foreach ($skillcheck as $row) {
                $skilllevel = $this->input->post($row);
                if ($skilllevel == 'delete') {
                    $deleteSkill = array(
                        'user_id' => $user,
                        'skill_id' => $row
                    );
                    $this->Manageskills_model->deleteSkills($deleteSkill);
                        $msg = $row.' has been deleted';
                        array_push($addedMsg, $msg);
                     
                } else {
                    $skilldata = array(
                        'user_id' => $user,
                        'skill_id' => $row,
                        'skilllevel' => $this->input->post($row)
                    );
                    $this->Manageskills_model->updateSkills($skilldata);
                        $msg = 'Your preference for skill '. $row .' has been added.';
                        array_push($addedMsg, $msg);
                    } 
                }
            }
        
        $data = array(
            'addedMsg' => $addedMsg,
            'msgError' => $msgError
        );

        $this->session->set_flashdata($data);
        redirect('manageskills', 'refreah');
    }

}
