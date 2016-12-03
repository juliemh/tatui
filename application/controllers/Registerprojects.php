<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Registerprojects extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url', 'html'));
        $this->load->model('Registerprojects_model');
        $this->load->library('session');
    }

    public function call_page($data) {
        $usertype = 'student';
        $this->load->view('templates/header', $data);
        $this->load->view('pages/' . $usertype . '/nav');
        $this->load->view('templates/content');
        $this->load->view('templates/footer');
    }

    function index() {
        //   $user = $this->session->userdata('user');
        $usertype = 'student';
        if ($this->Registerprojects_model->chkempty('course') &&
                $this->Registerprojects_model->chkempty('subject') &&
                $this->Registerprojects_model->chkempty('semester')) {
            $data = array(
                'page_title' => 'Register Projects',
                'title' => $usertype,
                'message' => '',
                'includes' => 'pages/' . $usertype . './registerprojects'
            );

            $data['course'] = $this->Registerprojects_model->getCourses();
            $this->call_page($data);
        } else {
            $data = array(
                'page_title' => 'Register Projects',
                'title' => $usertype,
                'message' => '',
                'user' => $this->session->userdata('user'),
                'includes' => 'pages/' . $usertype . '/registerprojects_error'
            );
        }
    }

    function validate() {
        //  $user = $this->session->userdata('user');
        $this->session->unset_userdata('teammates');
        $mates = $this->input->post('pref');
        $proj = $this->input->post();

        //set the variables to empty so a comparison can be made
        //if the variables have a variable and another choice has
        //been made for the choice a message will display
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
        //array variables 2 x message arrays 
        //updateValues array contain the choice number for displaying updated options
        $addedMsg = array();
        $msgError = array();
        $updateValues = array();

        $totalProj = $this->session->userdata('totalProj');

        foreach ($proj as $row => $value) {
            $prefer = $this->input->post($row);
            $projId = str_replace('_', ' ', $row);

            switch ($prefer) {
                case 1:
                    if ($project_choice_1 != '') {
                        $msg1 = 'You have selected the same preference for ' . $project_choice_1 . ' and ' . $row . '  Please make another selection';
                        array_push($msgError, $msg1);
                    } else {
                        $project_choice_1 = $projId;
                        $values = array(
                            'project_id' => $projId,
                            'selection' => 1
                        );
                        array_push($updateValues, $values);
                    }
                    break;
                case 2:
                    if ($project_choice_2 != '') {
                        $msg1 = 'You have selected the same preference for ' . $project_choice_2 . ' and ' . $row . '  Please make another selection';
                        array_push($msgError, $msg1);
                    } else {
                        $project_choice_2 = $projId;
                        $values = array(
                            'project_id' => $projId,
                            'selection' => 2
                        );
                        array_push($updateValues, $values);
                    }
                    break;
                case 3:
                    if ($project_choice_3 != '') {
                        $msg1 = 'You have selected the same preference for ' . $project_choice_3 . ' and ' . $row . '  Please make another selection';
                        array_push($msgError, $msg1);
                    } else {
                        $project_choice_3 = $projId;
                        $values = array(
                            'project_id' => $projId,
                            'selection' => 3
                        );
                        array_push($updateValues, $values);
                    }
                    break;
                case 4:
                    if ($project_choice_4 != '') {
                        $msg1 = 'You have selected the same preference for ' . $project_choice_4 . ' and ' . $value . '  Please make another selection';
                        array_push($msgError, $msg1);
                    } else {
                        $project_choice_4 = $projId;
                        $values = array(
                            'project_id' => $projId,
                            'selection' => 4
                        );
                        array_push($updateValues, $values);
                    }
                    break;
                case 5:
                    if ($project_choice_5 != '') {
                        $msg1 = 'You have selected the same preference for ' . $project_choice_5 . ' and ' . $value . '  Please make another selection';
                        array_push($msgError, $msg1);
                    } else {
                        $project_choice_5 = $projId;
                        $values = array(
                            'project_id' => $projId,
                            'selection' => 5
                        );
                        array_push($updateValues, $values);
                    }
                    break;
                case 6:
                    if ($project_choice_6 != '') {
                        $msg1 = 'You have selected the same preference for ' . $project_choice_6 . ' and ' . $value . '  Please make another selection';
                        array_push($msgError, $msg1);
                    } else {
                        $project_choice_6 = $projId;
                        $values = array(
                            'project_id' => $projId,
                            'selection' => 6
                        );
                        array_push($updateValues, $values);
                    }
                    break;
                case 7:
                    if ($project_choice_7 != '') {
                        $msg1 = 'You have selected the same preference for ' . $project_choice_7 . ' and ' . $value . '  Please make another selection';
                        array_push($msgError, $msg1);
                    } else {
                        $project_choice_7 = $projId;
                        $values = array(
                            'project_id' => $projId,
                            'selection' => 7
                        );
                        array_push($updateValues, $values);
                    }
                    break;
                case 8:
                    if ($project_choice_8 != '') {
                        $msg1 = 'You have selected the same preference for ' . $project_choice_8 . ' and ' . $value . '  Please make another selection';
                        array_push($msgError, $msg1);
                    } else {
                        $project_choice_8 = $projId;
                        $values = array(
                            'project_id' => $projId,
                            'selection' => 8
                        );
                        array_push($updateValues, $values);
                    }
                    break;
                case 9:
                    if ($project_choice_9 != '') {
                        $msg1 = 'You have selected the same preference for ' . $project_choice_9 . ' and ' . $row . '  Please make another selection';
                        array_push($msgError, $msg1);
                    } else {
                        $project_choice_9 = $projId;
                        $values = array(
                            'project_id' => $projId,
                            'selection' => 9
                        );
                        array_push($updateValues, $values);
                    }
                    break;
                case 10:
                    if ($project_choice_10 != '') {
                        $msg1 = 'You have selected the same preference for ' . $project_choice_10 . ' and ' . $value . '  Please make another selection';
                        array_push($msgError, $msg1);
                    } else {
                        $project_choice_10 = $projId;
                        $values = array(
                            'project_id' => $projId,
                            'selection' => 10
                        );
                        array_push($updateValues, $values);
                    }
                    break;
            }
        }
//check preferences have been added from 1 - 10 without missing any
        if ($totalProj > 1) {
            if ($project_choice_1 == '') {
                $msg1 = 'You have not entered a first preference';
                array_push($msgError, $msg1);
            }
        }
        if ($totalProj > 2) {
            if (($project_choice_1 != '') && ($project_choice_2 == '') && ($project_choice_3 != '')) {
                $msg1 = 'You have missed your second preference';
                array_push($msgError, $msg1);
            }
        }
        if ($totalProj > 3) {
            if (($project_choice_1 != '') && ($project_choice_2 != '') && ($project_choice_3 == '') && ($project_choice_4 != '')) {
                $msg1 = 'You have missed your third preference';
                array_push($msgError, $msg1);
            }
        }
        if ($totalProj > 4) {
            if (($project_choice_1 != '') && ($project_choice_2 != '') && ($project_choice_3 != '') && ($project_choice_4 == '') && ($project_choice_5 != '')) {
                $msg1 = 'You have missed your fourth preference';
                array_push($msgError, $msg1);
            }
        }
        if ($totalProj > 5) {
            if (($project_choice_1 != '') && ($project_choice_2 != '') && ($project_choice_3 != '') && ($project_choice_4 != '') && ($project_choice_5 == '') && ($project_choice_6 == '')) {
                $msg1 = 'You have missed your fifth preference';
                array_push($msgError, $msg1);
            }
        }
        if ($totalProj > 6) {

            if (($project_choice_1 != '') && ($project_choice_2 != '') && ($project_choice_3 != '') && ($project_choice_4 != '') && ($project_choice_5 != '') && ($project_choice_6 != '') && ($project_choice_7 != '')) {
                $msg1 = 'You have missed your sixtth preference';
                array_push($msgError, $msg1);
            }
        }
        if ($totalProj > 7) {

            if (($project_choice_1 != '') && ($project_choice_2 != '') && ($project_choice_3 != '') && ($project_choice_4 != '') && ($project_choice_5 != '') && ($project_choice_6 != '') && ($project_choice_7 == '') && ($project_choice_8 != '')) {
                $msg1 = 'You have missed your seventh preference';
                array_push($msgError, $msg1);
            }
        }
        if ($totalProj > 8) {
            if (($project_choice_1 != '') && ($project_choice_2 != '') && ($project_choice_3 != '') && ($project_choice_4 != '') && ($project_choice_5 != '') && ($project_choice_6 != '') && ($project_choice_7 != '') && ($project_choice_8 == '') && ($project_choice_9 != '')) {
                $msg1 = 'You have missed your eigth preference';
                array_push($msgError, $msg1);
            }
        }
        if ($totalProj > 9) {
            if (($project_choice_1 != '') && ($project_choice_2 != '') && ($project_choice_3 != '') && ($project_choice_4 != '') && ($project_choice_5 != '') && ($project_choice_6 != '') && ($project_choice_7 != '') && ($project_choice_8 != '') && ($project_choice_9 == '') && ($project_choice_10 != '')) {
                $msg1 = 'You have missed your ninth preference';
                array_push($msgError, $msg1);
            }
        }
        if (($project_choice_1 == '') && ($project_choice_2 == '') && ($project_choice_3 == '') && ($project_choice_4 == '') && ($project_choice_5 == '') && ($project_choice_6 == '') && ($project_choice_7 == '') && ($project_choice_8 == '') && ($project_choice_9 == '') && ($project_choice_10 == '')) {
            $msg1 = 'You have not selected any preference.  Please make a selection';
            array_push($msgError, $msg1);
        }
        $update = array(
            'user_id' => $this->session->userdata('user'),
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
            'team_member_choice_1' => strtoupper($mates[0]),
            'team_member_choice_2' => strtoupper($mates[1]),
            'team_member_choice_3' => strtok($mates[2])
        );

        if (!$this->Registerprojects_model->addPreferences($update)) {
            $msg1 = 'There was a problem saving your preferences.  Try again later';
            array_push($msgError, $msg1);
        } else {
            $msg = 'Your preferences have been saved';
            array_push($addedMsg, $msg);
        }
        $data['addedMsg'] = $addedMsg;
        $data['msgError'] = $msgError;
        $data['course'] = $proj['course'];
        $data['subject'] = $proj['subject'];
        $data['semester'] = $proj['semester'];
        //  $data['updateValues'] = $updateValues;
        //    $data['proj'] = $this->mergeData($updateValues, $proj['course'], $proj['subject'], $proj['semester']);

        $this->session->set_flashdata($data);
        $this->session->set_userdata('updateValues', $updateValues);
        $this->session->set_userdata('mates', $mates);
        redirect('updateprojects', 'refresh');
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

        //get course, subjec and semester details
        //get projects for the course, subject and sememeter
        //merge the skill details into the array
        //create output to display on the page
        $courseid = $this->input->post('course');
        $subjectid = $this->input->post('subject');
        $semesterid = $this->input->post('semester');
        $output = '<table width="90%"><tr><th></th><th>Project ID</th><th>Project Name</th>
                                <th>Project Description</th><th>Skills Required</th><th>Preference</th></tr>';
        $teammates = array();
        $updateValues = array();
        $query = $this->Registerprojects_model->getProjects($courseid, $subjectid, $semesterid);
        $this->session->set_userdata('totalProj', count($query));
        $results = $this->Registerprojects_model->getPreferences($query);
        if (!empty($results)) {
            foreach ($results as $key) {
                foreach ($key as $row => $value) {
                   if ($row == 'project_choice_1') {
                        $values = array(
                            'project_id' => $value,
                            'selection' => 1
                        );
                        array_push($updateValues, $values);
                    } elseif ($row == 'project_choice_2') {
                        $values = array(
                            'project_id' => $value,
                            'selection' => 2
                        );
                        array_push($updateValues, $values);
                    } elseif ($row == 'project_choice_3') {
                        $values = array(
                            'project_id' => $value,
                            'selection' => 3
                        );
                        array_push($updateValues, $values);
                    } elseif ($row == 'project_choice_4') {
                        $values = array(
                            'project_id' => $value,
                            'selection' => 4
                        );
                        array_push($updateValues, $values);
                    } elseif ($row == 'project_choice_5') {
                        $values = array(
                            'project_id' => $value,
                            'selection' => 5
                        );
                        array_push($updateValues, $values);
                    } elseif ($row == 'project_choice_6') {
                        $values = array(
                            'project_id' => $value,
                            'selection' => 6
                        );
                        array_push($updateValues, $values);
                    } elseif ($row == 'project_choice_7') {
                        $values = array(
                            'project_id' => $value,
                            'selection' => 7
                        );
                        array_push($updateValues, $values);
                    } elseif ($row == 'project_choice_8') {
                        $values = array(
                            'project_id' => $value,
                            'selection' => 8
                        );
                        array_push($updateValues, $values);
                    } elseif ($row == 'project_choice_9') {
                        $values = array(
                            'project_id' => $value,
                            'selection' => 9
                        );
                        array_push($updateValues, $values);
                    } elseif ($row == 'project_choice_10') {
                        $values = array(
                            'project_id' => $value,
                            'selection' => 10
                        );
                        array_push($updateValues, $values);
                    } elseif ($row == 'team_member_choice_1') {
                        $mate = $value;
                        array_push($teammates, $mate);
                    } elseif ($row == 'team_member_choice_2') {
                        $mate = $value;
                        array_push($teammates, $value);
                    } elseif ($row == 'team_member_choice_3') {
                        $mate = $value;
                        array_push($teammates, $value);
                    }
                }
            }
            $this->session->set_userdata('updateValues', $updateValues);
            $this->session->set_userdata('teammates', $teammates);



            $this->mergeUserData($query);
        } else {
            if (is_array($query) && count($query) > 0) {
                $mergedData = $this->mergeSkills($query);

                if (is_array($mergedData) && count($mergedData) > 0) {
                    foreach ($mergedData as $row) {
                        $output .= '<tr><td><input type="checkbox" value="' . $row['project_id'] . '"/></td>'
                                . '<td>' . $row['project_id'] . ' </td>'
                                . '<td>' . $row['project_name'] . '</td>'
                                . '<td>' . $row['project_desc'] . ' </td><td>' . $row['skills'] . ' </td>'
                                . '<td> <select name="' . $row['project_id'] . '" onchange="runme(this);">'
                                . '<option>Select</option>'
                                . '<option value="1">1</option>'
                                . '<option value="2">2</option>'
                                . '<option value="3">3</option>'
                                . '<option value="4">4</option>'
                                . '<option value="5">5</option>'
                                . '<option value="6">6</option>'
                                . '<option value="7">7</option>'
                                . '<option value="8">8</option>'
                                . '<option value="9">9</option>'
                                . '<option value="10">10</option>'
                                . '</select> </td></tr>';
                    }
                } else {
                    $output = '<h4>Sorry there are no projects for this subject.  Please make another selection or try again later</h4>';
                }
            }
            $output .= '</tabe>';
            echo $output;
        }
    }

    function mergeSkills($query) {
        $previousid = '';
        $previousName = '';
        $previousDesc = '';

        $skill = '';
        $array = array();


        foreach ($query as $q) {
            if ($q === reset($query)) {
                $previousid = $q['project_id'];
                $previousName = $q['project_name'];
                $previousDesc = $q['project_desc'];
            }
        }
        //loop through the array and merge the skills into one field.
        //set a previous field to compare the project id to
        //if the current project id is the same, concatenate the skills
        //else set the array values and set previous fields 
        foreach ($query as $q) {

            if ($q['project_id'] == $previousid) {
                $skill = $skill . "Skill " . $q['skill_id'] . " requires level " . $q['skill_level'] . ". ";
            } else {
                $array[] = array(
                    'project_id' => $previousid,
                    'project_name' => $previousName,
                    'project_desc' => $previousDesc,
                    'skills' => $skill
                );

                $previousid = $q['project_id'];
                $previousName = $q['project_name'];
                $previousDesc = $q['project_desc'];
                $skill = "Skill " . $q['skill_id'] . " requires level " . $q['skill_level'] . ". ";
            }
        }
        //add the last values to the array
        $array[] = array(
            'project_id' => $previousid,
            'project_name' => $previousName,
            'project_desc' => $previousDesc,
            'skills' => $skill
        );
        return $array;
    }

    public function mergeData($updateValues, $result) {
        $htmldata = array();
        $projid = '';
        $prid = '';
        $projname = '';
        $projdesc = '';
        $skills = '';
        $selected = '';

        foreach ($result as $key) {
            foreach ($key as $row => $value) {
                if ($row == 'project_id') {
                    $projid = $value;
                } elseif ($row == 'project_name') {
                    $projname = $value;
                } elseif ($row == 'project_desc') {
                    $projdesc = $value;
                } elseif ($row == 'skills') {
                    $skills = $value;
                }
                $selected = '';
                if (count($updateValues) > 0) {
                    foreach ($updateValues as $innerArray) {
                        foreach ($innerArray as $key => $value) {
                            if ($key == 'project_id') {
                                $prid = str_replace('_', ' ', $value);
                            } elseif ($key == 'selection') {
                                if ($projid == $prid) {
                                    $selected = $value;
                                }
                            }
                        }
                    }
                }
            }


            $data = array(
                'project_id' => $projid,
                'project_name' => $projname,
                'project_desc' => $projdesc,
                'skills' => $skills,
                'selection' => $selected
            );

            array_push($htmldata, $data);
        }
        return $htmldata;
    }

    function getUserData() {
        // get course, subject and semester id
        //get project details for the course, subject and semester
        // merge the skill data into the array
        // set output heading     
        $course = trim($this->input->post('course'));
        $subject = trim($this->input->post('subject'));
        $semester = trim($this->input->post('semester'));

        $opt = null;
        $query = $this->Registerprojects_model->getProjects($course, $subject, $semester);
        $this->mergeUserData($query);
    }

    function mergeUserData($query) {


        $updateValues = $this->session->userdata('updateValues');
        if (is_array($query) && count($query) > 0) {

            $mergedData = $this->mergeSkills($query);
        }
        $htmlData = $this->mergeData($updateValues, $mergedData);

        $output = '<table width="90%"><tr><th></th><th>Project ID</th><th>Project Name</th>
                                <th>Project Description</th><th>Skills Required</th><th>Preference</th></tr>';

        foreach ($htmlData as $key => $insideArrays) {
            foreach ($insideArrays as $k2 => $insideInsideArrays) {

                if ($k2 == 'project_id') {
                    $pid = $insideInsideArrays;
                } elseif ($k2 == 'project_name') {
                    $pname = $insideInsideArrays;
                } elseif ($k2 == 'project_desc') {
                    $pdesc = $insideInsideArrays;
                } elseif ($k2 == 'skills') {
                    $skill = $insideInsideArrays;
                } elseif ($k2 == 'selection') {
                    if ($insideInsideArrays == '') {
                        $select = '';
                    } else {
                        $select = $insideInsideArrays;
                    }
                }
            }
            $opt = '';
            for ($i = 1; $i <= 10; $i++) {
                if ($select == $i) {
                    $opt .= '<option value="' . $i . '" selected >' . $i . '</option>';
                } else {
                    $opt .= '<option value="' . $i . '">' . $i . '</option>';
                }
            }
            $output .= '<tr>
                   <td><input type="checkbox" value="' . $pid . '" /></td>
                   <td>' . $pid . '  </td>
                   <td>' . $pname . ' </td>
                   <td>' . $pdesc . '</td>
                   <td>' . $skill . '</td>
                   <td> <select name="' . $pid . '" onchange="runme(this);" >
                   <option  selected>Select</option>'
                    . $opt
                    . ' </select></td></tr>';
        }
        $output .= '</table>';
        echo($output);
    }

}
