<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Registerprojects extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url', 'html', 'date'));
        $this->load->model('Registerprojects_model');
    }

    public function call_page($data) {
        $usertype = 'student';
        $this->load->view('templates/header', $data);
        $this->load->view('pages/' . $usertype . '/nav');
        $this->load->view('templates/content');
        $this->load->view('templates/footer');
    }

    function index() {
        $usertype = 'student';

        if ($this->Registerprojects_model->chkempty('course') &&
                $this->Registerprojects_model->chkempty('subject') &&
                $this->Registerprojects_model->chkempty('semester')) {
            $data = array(
                'page_title' => 'Register Projects',
                'title' => $usertype,
                'message' => '',
                'includes' => 'pages/' . $usertype . '/registerprojects'
            );

            $data['course'] = $this->Registerprojects_model->getCourses();
            //   print_r($data['course']);
            //  $data['semester'] = $this->Registerprojects_model->getSemester();
            $this->call_page($data);
        } else {
            $data = array(
                'page_title' => 'Register Projects',
                'title' => $usertype,
                'message' => '',
                'includes' => 'pages/' . $usertype . '/registerprojects_error'
            );
        }
    }

    public function validate() {
        $user = $this->session->userdata('user');
        $mates = $this->input->post('pref');

        $proj = $this->input->post(NULL, TRUE);
        $project_choice_1 = '';
        $project_choice_2 = '';
        $project_choice_3 = '';
        $project_choice_4 = '';
        $project_choice_5 = '';
        $project_choice_6 = '';
        $project_choice_7 = '';
        $project_choice_8 = '';
        $project_choice_9 = '';
        $project_choice_10 = '';

        $addedMsg = array();
        $msgError = array();

        foreach ($proj as $row => $values) {
            $pref = $this->input->post($row);

            switch ($pref) {
                case 1:
                    if ($project_choice_1 != '') {
                        $msg1 = 'Project ' . $row . ' preference ' . $pref . ' is duplicated.  Please make another selection';
                        array_push($msgError, $msg1);
                    } else {
                        $project_choice_1 = $row;
                    }
                    break;
                case 2:
                    if ($project_choice_2 != '') {
                        $msg1 = 'Project ' . $row . ' preference ' . $pref . 'i s duplicated.  Please make another selection';
                        array_push($msgError, $msg1);
                    } else {
                        $project_choice_2 = $row;
                    }
                    break;
                case 3:
                    if ($project_choice_3 != '') {
                        $msg1 = 'Project ' . $row . ' preference ' . $pref . ' is duplicated.  Please make another selection';
                        array_push($msgError, $msg1);
                    } else {
                        $project_choice_3 = $row;
                    }
                    break;
                case 4:
                    if ($project_choice_4 != '') {
                        $msg1 = 'Project ' . $row . ' preference ' . $pref . ' is duplicated.  Please make another selection';
                        array_push($msgError, $msg1);
                    } else {
                        $project_choice_4 = $row;
                    }
                    break;
                case 5:
                    if ($project_choice_5 != '') {
                        $msg1 = 'Project ' . $row . ' preference ' . $pref . ' is duplicated.  Please make another selection';
                        array_push($msgError, $msg1);
                    } else {
                        $project_choice_5 = $row;
                    }
                    break;
                case 6:
                    if ($project_choice_6 != '') {
                        $msg1 = 'Project ' . $row . ' preference ' . $pref . ' is duplicated.  Please make another selection';
                        array_push($msgError, $msg1);
                    } else {
                        $project_choice_6 = $row;
                    }
                    break;
                case 7:
                    if ($project_choice_7 != '') {
                        $msg1 = 'Project ' . $row . ' preference ' . $pref . ' is duplicated.  Please make another selection';
                        array_push($msgError, $msg1);
                    } else {
                        $project_choice_7 = $row;
                    }
                    break;
                case 8:
                    if ($project_choice_8 != '') {
                        $msg1 = 'Project ' . $row . ' preference ' . $pref . ' is duplicated.  Please make another selection';
                        array_push($msgError, $msg1);
                    } else {
                        $project_choice_8 = $row;
                    }
                    break;
                case 9:
                    if ($project_choice_9 != '') {
                        $msg1 = 'Project ' . $row . ' preference ' . $pref . ' is duplicated.  Please make another selection';
                        array_push($msgError, $msg1);
                    } else {
                        $project_choice_9 = $row;
                    }
                    break;
                case 10:
                    if ($project_choice_10 != '') {
                        $msg1 = 'Project ' . $row . ' preference ' . $pref . ' is duplicated.  Please make another selection';
                        array_push($msgError, $msg1);
                    } else {
                        $project_choice_10 = $row;
                    }
                    break;
            }
        }
//check preferences have been added from 1 - 10 without missing any
        if ($project_choice_1 == '') {
            $msg1 = 'You have not entered a first preference';
            array_push($msgError, $msg1);
        };
        if (($project_choice_1 != '') && ($project_choice_2 == '') && ($project_choice_3 != '')) {
            $msg1 = 'You have missed your second preference';
            array_push($msgError, $msg1);
        };
        if (($project_choice_1 != '') && ($project_choice_2 != '') && ($project_choice_3 == '') && ($project_choice_4 != '')) {
            $msg1 = 'You have missed your third preference';
            array_push($msgError, $msg1);
        };

        if (($project_choice_1 != '') && ($project_choice_2 != '') && ($project_choice_3 != '') && ($project_choice_4 == '') && ($project_choice_5 != '')) {
            $msg1 = 'You have missed your fourth preference';
            array_push($msgError, $msg1);
        };

        if (($project_choice_1 != '') && ($project_choice_2 != '') && ($project_choice_3 != '') && ($project_choice_4 != '') && ($project_choice_5 == '') && ($project_choice_6 == '')) {
            $msg1 = 'You have missed your fifth preference';
            array_push($msgError, $msg1);
        };

        if (($project_choice_1 != '') && ($project_choice_2 != '') && ($project_choice_3 != '') && ($project_choice_4 != '') && ($project_choice_5 != '') && ($project_choice_6 != '') && ($project_choice_7 != '')) {
            $msg1 = 'You have missed your sixtth preference';
            array_push($msgError, $msg1);
        };

        if (($project_choice_1 != '') && ($project_choice_2 != '') && ($project_choice_3 != '') && ($project_choice_4 != '') && ($project_choice_5 != '') && ($project_choice_6 != '') && ($project_choice_7 == '') && ($project_choice_8 != '')) {
            $msg1 = 'You have missed your seventh preference';
            array_push($msgError, $msg1);
        };

        if (($project_choice_1 != '') && ($project_choice_2 != '') && ($project_choice_3 != '') && ($project_choice_4 != '') && ($project_choice_5 != '') && ($project_choice_6 != '') && ($project_choice_7 != '') && ($project_choice_8 == '') && ($project_choice_9 != '')) {
            $msg1 = 'You have missed your eigth preference';
            array_push($msgError, $msg1);
        };

        if (($project_choice_1 != '') && ($project_choice_2 != '') && ($project_choice_3 != '') && ($project_choice_4 != '') && ($project_choice_5 != '') && ($project_choice_6 != '') && ($project_choice_7 != '') && ($project_choice_8 != '') && ($project_choice_9 == '') && ($project_choice_10 != '')) {
            $msg1 = 'You have missed your ninth preference';
            array_push($msgError, $msg1);
        };

        $team_member_choice_1 = strtoupper($mates[0]);
        $team_member_choice_2 = strtoupper($mates[1]);
        $team_member_choice_3 = strtoupper($mates[2]);

        $update = array(
            'user_id' => $user,
            'project_choice_1' => $project_choice_1,
            'project_choice_2' => $project_choice_2,
            'project_choice_3' => $project_choice_3,
            'project_choice_4' => $project_choice_4,
            'project_choice_5' => $project_choice_5,
            'project_choice_6' => $project_choice_6,
            'project_choice_7' => $project_choice_7,
            'project_choice_8' => $project_choice_8,
            'project_choice_9' => $project_choice_9,
            'project_choice_10' => $project_choice_10,
            'team_member_choice_1' => $team_member_choice_1,
            'team_member_choice_2' => $team_member_choice_2,
            'team_member_choice_3' => $team_member_choice_3
        );

        if ($this->Registerprojects_model->addPreferences($update)) {
            $msg = 'Your preferences have been saved';
            array_push($addedMsg, $msg);
        }

        $data['addedMsg'] = $addedMsg;
        $data['msgError'] = $msgError;
        $data['course'] = $proj['course'];
        $data['subject'] = $proj['subject'];
        $data['semester'] = $proj['semester'];
        $data['user'] = $user;
        $data['mates'] = $mates;
        $data['proj'] = $this->mergeData($proj);
        $this->session->set_flashdata($data);

        //  print_r($data);
        redirect('./updateprojects');
    }

    public function getSubjects() {
        $courseid = $this->input->post('course', TRUE);

        $subjectData['subject'] = $this->Registerprojects_model->getSubjectsByCourse($courseid);

        $output = null;

        foreach ($subjectData['subject']->result() as $row) {
//here we build a dropdown item line for each query result
            $output .= "<option value='" . $row->subject_id . "'>" . $row->subject_id . "</option>";
        }

        echo $output;
    }

    public function getSemester() {
        $courseid = $this->input->post('course', TRUE);
        $subjectid = $this->input->post('subject', TRUE);
        $semesterData = $this->Registerprojects_model->getSemester($courseid, $subjectid);
        $output = null;
        foreach ($semesterData as $row) {
//here we build a dropdown item line for each query result
            $output .= "<option value='" . $row['semester_id'] . "'>" . $row['semester_id'] . "</option>";
        }

        echo $output;
    }

    public function getProjectDetails() {
        $courseid = $this->input->post('course');
        $subjectid = $this->input->post('subject');
        $semesterid = $this->input->post('semester');

        $query = $this->Registerprojects_model->getProjects($courseid, $subjectid, $semesterid);

        echo json_encode($query);
    }

    public function mergeData($data) {
        //  print_r($data);
        $htmldata = array();
        $selection = '';
        $query = $this->Registerprojects_model->getProjects($data['course'], $data['subject'], $data['semester']);
        foreach ($query as $q) {
            foreach ($data as $p => $value) {
                if ($p == $q['project_id']) {
                    $selection = $value;
                }
            }
            for ($i = 1; $i < 11; $i++) {
                if ($selection = $i) {
                    $opt .= '<option value="' . $i . '" selected="selected">' . $i . '</select>';
                } else {
                    $opt .= '<option value="' . $i . '">' . $i . '</select>';
                }
            }

            $line = '<tr><td><input type="checkbox" value="' . $q['project_id'] . '"/></td>'
                    . ' <td>' . $q['project_id'] . ' </td>'
                    . '<td>' . $q['project_name'] . '</td>'
                    . ' <td>' . $q['project_desc'] . ' </td><td>' . $q['skills'] . ' </td>'
                    . ' <td> <select name="' . $q['project_id'] . '" >'
                    . $opt
                    . '</select> </td></tr>';
            array_push($htmldata, $line);
        }
        return $htmldata;
    }

}
