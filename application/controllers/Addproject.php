<?php

class Addproject extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url', 'html'));
        $this->load->library('form_validation');
//   $this->load->database();
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
                'page_title' => 'Add Project!',
                'title' => $usertype,
                'message' => '',
                'includes' => 'pages/' . $usertype . '/adding_Project'
            );

            //$data['result']= $this->Model_Adding_Project->getAllCourses();
            $data['course'] = $this->Model_adding_project->getCourses();
            $data['results'] = $this->Model_adding_project->getAllLecturer();
            //$data['subjects']= $this->Model_Adding_Project->getAllSubjects();
            $data['skills'] = $this->Model_adding_project->getAllSkills();

            $this->form_validation->set_rules('project_id', 'Project ID', 'required');
            $this->form_validation->set_rules('project_name', 'Project Name', 'required');
            $this->form_validation->set_rules('project_desc', 'Project Description', 'required');
            $this->form_validation->set_rules('start_date', 'Project Start', 'required');
            $this->form_validation->set_rules('finish_date', 'Project Finish', 'required');
            $this->form_validation->set_rules('team_size', 'Project Team', 'required');
            $this->form_validation->set_rules('courses', 'Courses', 'callback_validate_dropdown');
            $this->form_validation->set_rules('subjects', 'Subjects', 'callback_validate_dropdown');
            $this->form_validation->set_rules('lecturers', 'Lecturerss', 'callback_validate_dropdown');
            $this->form_validation->set_rules('skills', 'Skills', 'callback_validate_checkbox');
            $this->call_page($data);
        } else {
            echo 'error';
        }
    }

    function validate() {
        //Variables for Adding a Project//  

        $projectid = $this->input->post('project_id');
        $projectname = $this->input->post('project_name');
        $description = $this->input->post('description');
        $subjectid = $this->input->post('subjectid');
        $courseid = $this->input->post('courseid');
        $lecturerid = $this->input->post('lecturerid');
        $startDate = $this->input->post('startDate');
        $endDate = $this->input->post('endDate');

        $is_valid = $this->Model_adding_project->validate($projectid, $courseid, $subjectid);
        echo 'validation';

        if (!$is_valid)/* If not valid then the subject and course combination doesn't exist */ {
            $data = array(
                'project_id' => $projectid,
                'project_name' => $projectname,
                'project_description' => $description,
                'courses_id' => $courseid,
                'subject_id' => $subjectid,
                'user_id' => $lecturerid,
                'startDate' => $startDate,
                'endDate' => $endDate
            );
            $this->Model_adding_project->add_project($data);

            $this->session->set_flashdata('msg', 'The project ' . $projectid . ' was successfully added');
            redirect('addproject');
        } else { // course already exists 
            $this->session->set_flashdata('msg', 'This Project, Course and Subject combination already exists');
            redirect('addproject');
        }
    }

    public function getSubjects() {

        //set selected country id from POST
        $courseid = $this->input->post('courseid', TRUE);
        echo $courseid;

        //run the query for the cities we specified earlier
        $subjectData['subjects'] = $this->Model_adding_project->getSubjectsByCourse($courseid);

        $output = null;

        foreach ($subjectData['subjects']->result() as $row) {
            //here we build a dropdown item line for each query result
            $output .= "<option value='" . $row->subject_id . "'>" . $row->subject_id . "</option>";
        }

        echo $output;
    }

    function updateSelected() {
        $selected = $this->input->post('selected');
        $projectid = $this->input->post('projectid');

        foreach ($selected as $sid) {
            $level = $sid->name;
            $data = array(
                'project_id' => $projectid,
                'skill_id' => $sid['Skill_id'],
                'skill_level' => $level);
            $this->Model_adding_project->add_project_skill($data);
        }
    }

}
