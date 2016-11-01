<?php

class Addproject extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url', 'html', 'inflector', 'date'));
        $this->load->library('form_validation');
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
                $this->Model_adding_project->chkempty('skill_dictionary') && $this->Model_adding_project->chkempty('semester')) {
            // page data to be passed will be usertype by default
            $data = array(
                'page_title' => 'Add Project!',
                'title' => $usertype,
                'message' => '',
                'includes' => 'pages/' . $usertype . '/adding_Project'
            );
            $data['course'] = $this->Model_adding_project->getCourses();
            $data['skills'] = $this->Model_adding_project->getSkills();
            $data['semester'] = $this->Model_adding_project->getSemester();

//            $this->form_validation->set_rules('project_id', 'Project ID', 'required');
//            $this->form_validation->set_rules('project_name', 'Project Name', 'required');
//            $this->form_validation->set_rules('project_desc', 'Project Description', 'required');
//            $this->form_validation->set_rules('start_date', 'Project Start', 'required');
//            $this->form_validation->set_rules('finish_date', 'Project Finish', 'required');
//            $this->form_validation->set_rules('team_size', 'Project Team', 'required');
//            $this->form_validation->set_rules('courses', 'Courses', 'callback_validate_dropdown');
//            $this->form_validation->set_rules('subjects', 'Subjects', 'callback_validate_dropdown');
//            $this->form_validation->set_rules('skills', 'Skills', 'callback_validate_radio');
//            $this->form_validation->set_rules('teamsize', 'Teamsize', 'required');
            $this->call_page($data);
        } else {
            $data = array(
                'page_title' => 'Add Project!',
                'title' => $usertype,
                'message' => '',
                'includes' => 'pages/' . $usertype . '/addproject_error'
            );
            $this->call_page($data);
        }
    }

    function validate() {
        //Variables for Adding a Project//  

        $projectid = strtoupper($this->input->post('project_id'));
        $projectname = humanize($this->input->post('project_name'));
        $description = humanize($this->input->post('description'));
        $subjectid = $this->input->post('subject');
        $courseid = $this->input->post('course');
        //  $semester = $this->input->post('semester');
        $startDate = @date('Y-m-d', @strtotime($this->input->post('startdate')));

        $finishDate = @date('Y-m-d', @strtotime($this->input->post('finishdate')));
        $teamsize = $this->input->post('team_size');
        $this->session->set_flashdata('msg', 'Start is ' . $startDate . ' Finish date is ' . $finishDate);


        if ($this->Model_adding_project->validate($projectid, $courseid, $subjectid)) {
            $this->session->set_flashdata('msg1', 'This Project, ' . projectid . ' and Course ' . $courseid . ' and Subject ' . $subjectid . ' combination already exists');
            redirect('addproject');
        } else {
            if ($this->Model_adding_project->validateProjCourse($projectid, $courseid)) {

                $this->session->set_flashdata('msg1', 'This Project, ' . projectid . ' and Subject ' . $subjectid . ' combination already exists');
                redirect('addproject');
            } else {
                if ($this->Model_adding_project->validateProj($projectid)) {
                    $this->session->set_flashdata('msg1', 'This Project, ' . projectid . '  already exists');
                    redirect('addproject');
                } else {
                    $data = array(
                        'project_id' => $projectid,
                        'project_name' => $projectname,
                        'project_desc' => $description,
                        'course_id' => $courseid,
                        'subject_id' => $subjectid,
                        'start_date' => $startDate,
                        'finish_date' => $finishDate,
                        'team_size' => $teamsize
                    );

                    if ($this->Model_adding_project->add_project($data)) {

                        if (!empty($this->input->post('skillcheck'))) {
                            foreach ($this->input->post('skillcheck') as $value) {
                                $skilldata = array(
                                    'project_id' => $projectid,
                                    'skill_id' => $value,
                                    'skill_level' => $this->input->post($value)
                                );
                                if (!$this->Model_adding_project->add_project_skills($skilldata)) {
                                    $this->session->set_flashdata('msg1', 'Unable to add the skills');
                                    redirect('addproject');                                    
                                }
                            }
                        }
                        $this->session->set_flashdata('msg', 'The project ' . $projectid . ' was successfully added');
                        redirect('addproject');
                    } else {
                        $this->session->set_flashdata('msg1', 'Unable to add the project ' . $projectid);
                        redirect('addproject');
                    }
                }
            }
        }
    }

    public function getSubjects() {

        //set selected country id from POST
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
