<?php

class Addproject extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url', 'html', 'inflector', 'date'));
        $this->load->library(array('session', 'form_validation'));
        $this->load->model('Model_adding_project');
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
        if ($this->Model_adding_project->chkempty('course') &&
                $this->Model_adding_project->chkempty('subject') &&
                $this->Model_adding_project->chkempty('skill_dictionary')) {
            // page data to be passed will be usertype by default
            $data = array(
                'page_title' => 'Add Project',
                'title' => $usertype,
                'message' => '',
                'includes' => 'pages/' . $usertype . '/adding_Project'
            );
            $data['course'] = $this->Model_adding_project->getCourses();
            $data['skills'] = $this->Model_adding_project->getSkills();

            $this->call_page($data);
        } else {
            $data = array(
                'page_title' => 'Add Project',
                'title' => $usertype,
                'message' => '',
                'includes' => 'pages/' . $usertype . '/addproject_error'
            );
            $this->call_page($data);
        }
    }

    public function validate() {
        //Variables for Adding a Project//  
        $projectid = strtoupper($this->input->post('project_id'));
        $projectname = humanize($this->input->post('project_name'));
        $description = humanize($this->input->post('project_desc'));
        $subjectid = $this->input->post('subject');
        $courseid = $this->input->post('course');
        $startDate = @date('Y-m-d', @strtotime($this->input->post('startdate')));
        $finishDate = @date('Y-m-d', @strtotime($this->input->post('finishdate')));
        $teamsize = $this->input->post('team_size');
        $skillcheck = $this->input->post('skillcheck');
        $skillAddedMsg = array();

        $formdata = array(
            'project_id' => $projectid,
            'project_name' => $projectname,
            'project_desc' => $description,
            'subject_id' => $subjectid,
            'course_id' => $courseid,
            'start_date' => $startDate,
            'finish_date' => $finishDate,
            'team_size' => $teamsize
        );

        if ($this->Model_adding_project->validateThree($projectid, $courseid, $subjectid)) {
            //$msg1 =  $this->session->set_flashdata('msg1', 'This Project, {projectid} and Course {$courseid} and Subject {$subjectid} combination already exists');
            $data = array(
                'msg1' => $this->session->set_flashdata('msg1', 'This Project ' . $projectid . ' and Course ' . $courseid . ' and Subject ' . $subjectid . ' combination already exists')
            );
            $this->session->set_flashdata($data);
            redirect('addproject');
        } else if ($this->Model_adding_project->validateProjCourse($projectid, $courseid)) {
            $data = array(
                'msg1' => 'This Project ' . $projectid . ', and Subject ' . $subjectid . ' combination already exists',
            );
            $this->session->set_flashdata($data);
            redirect('addproject');
        } else if ($this->Model_adding_project->validateProj($projectid)) {

            $data = array(
                'msg1' => 'This Project ' . $projectid . '  already exists',
            );
            $this->session->set_flashdata($data);
            redirect('addproject');
        } else if (count($skillcheck) == 0) {
            $data = array(
                'msg1' => 'Please select at least one skill'
            );
            $this->session->set_flashdata($data);
            redirect('addproject');
        } else {
            foreach ($skillcheck as $row) {
                if ($this->Model_adding_project->validateThreeskills($projectid, $row, $row)) {
                    $data = array(
                        'msg1' => 'That project, skills and skill levels already exist.'
                    );
                    $this->session->set_flashdata($data);
                    redirect('addproject');
                } else {

                    if ($this->Model_adding_project->validateTwoSkills($projectid, $row)) {
                        $data = array(
                            'msg1' => 'That project and skill already exist'
                        );
                        $this->session->set_flashdata($data);
                        redirect('addproject');
                    } else {
                        $skilldata = array(
                            'project_id' => $projectid,
                            'skill_id' => $row,
                            'skill_level' => $this->input->post($row)
                        );
                        if ($this->Model_adding_project->add_project_skills($skilldata)) {
                            $skillAddedMsg = array(
                                'msg1' => 'Unable to add the skill '.$row. ' level '. $this->input->post($row)
                            );
                            
                        }
                    }
                }
                if ($this->Model_adding_project->add_project($formdata)) {
                    $projAdded = array(
                        'msg' => 'The project ' . $projectid . ' was successfully added'
                    );
                    $data = array(
                       'proj' => $projAdded,
                       'skill' => $skillAddedMsg
                    );
                    $this->session->set_flashdata($data);
                    redirect('addproject');
                } else {
                    $data = array(
                        'msg1' => 'Unable to add the project ' . $projectid);
                    $this->session->set_flashdata($data);
                    redirect('addproject');
                }
            }
        }
    }

    public function getSubjects() {

        $courseid = $this->input->post('course', TRUE);
        echo $courseid;


        $subjectData['subjects'] = $this->Model_adding_project->getSubjectsByCourse($courseid);

        $output = null;

        foreach ($subjectData['subjects']->result() as $row) {
            //here we build a dropdown item line for each query result
            $output .= "<option value='" . $row->subject_id . "'>" . $row->subject_id . "</option>";
        }

        echo $output;
    }

}
