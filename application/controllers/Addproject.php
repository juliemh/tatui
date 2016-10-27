<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Addproject extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url', 'html'));
        $this->load->library('form_validation');
//   $this->load->database();
        $this->load->model('addproject_model');
    }

    public function construct_pages($page, $data) {
        $this->load->view('templates/header', $data);
        $this->load->view('pages/' . $page);
        $this->load->view('templates/footer');
    }

    function index() {
        $display = 'addproject';
        $data = array(
            'page_title' => 'Admin Add Project',
            'title' => 'Add Projects'
        );
        $data['courses'] = $this->addproject_model->getCourses();
//$data['subjects'] = $this->addproject_model->getSubjects($this->input->post('courseid'));
        $data['lecturers'] = $this->addproject_model->getLecturers();
        $data['skills'] = $this->addproject_model->getSkills();

        $this->form_validation->set_rules('courses', 'Courses', 'callback_validate_dropdown');
        $this->form_validation->set_rules('subjects', 'Subjects', 'callback_validate_dropdown');
        $this->form_validation->set_rules('lecturers', 'Lecturerss', 'callback_validate_dropdown');
        $this->form_validation->set_rules('skills', 'Skills', 'callback_validate_checkbox');
        $this->construct_pages($display, $data);
    }

    function validate() {
        $projectid = $this->input->post('projectid');
        $description = $this->input->post('description');
        $subjectid = $this->input->post('subjectid');
        $courseid = $this->input->post('courseid');
        $lecturerid = $this->input->post('lecturerid');
        $description = $this->input->post('description');
        $startDate = $this->input->post('startDate');
        $endDate = $this->input->post('endDate');

        $is_valid = $this->addproject_model->validate($projectid, $courseid, $subjectid);
        echo 'validation';
        if (!$is_valid)/* If not valid then the subject and course combination doesn't exist */ {
            $data = array(
                'ProjectID' => $projectid,
                'Description' => $description,
                'CourseID' => $courseid,
                'UserID' => $lecturerid,
                'SubjectID' => $subjectid,
                'startDate' => $startDate,
                'endDate' => $endDate
            );
            $this->addproject_model->add_project($data);

            $this->session->set_flashdata('msg', 'The project ' . $projectid . ' was successfully added');
            redirect('addsubject');
        } else { // course already exists 
            $this->session->set_flashdata('msg', 'This Project, Course and Subject combination already exists');
            redirect('addproject');
        }
    }

   public function getSubjects() {

       //set selected country id from POST
        $courseid = $this->input->post('courseid',TRUE);
        echo $courseid;

        //run the query for the cities we specified earlier
        $subjectData['subjects']=$this->addproject_model->getSubjectsByCourse($courseid);
        
       $output = null;

        foreach ($subjectData['subjects']->result() as $row)
        {
            //here we build a dropdown item line for each query result
            $output .= "<option value='".$row->SubjectID."'>".$row->SubjectDesc."</option>";
        }

        echo  $output;
    }
    
    function updateSelected() {
        $selected = $this->input->post('selected');
        $projectid = $this->input->post('projectid');

        foreach ($selected as $sid) {
            $level = $sid->name;
            $data = array(
                'ProjectID' => $projectid,
                'SkillID' => $sid['SkillName'],
                'SkillLevel' => $level);
            $this->addproject_model->add_project_skill($data);
        }
    }

}
