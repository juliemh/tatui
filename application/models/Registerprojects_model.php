<?php

class Registerprojects_model extends CI_Model {
    /* Check if the course exists */

    function getCourses() {
        $this->db->select('course_id, course_name');
        $this->db->from('course');
        $this->db->order_by('course_id');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            return $result;
        }
    }

    function getSubjectsByCourse($course = string) {
        $this->db->select('a.subject_id, b.subject_name');
        $this->db->from('course_subject a');
        $this->db->join('subject b', 'a.subject_id = b.subject_id ');
        $this->db->where('a.course_id', $course);
        $query = $this->db->get();
        return $query;
    }

    function getSemester($courseid = string, $subjectid = string) {

        $this->db->select('semester_id');
        $this->db->from('course_subject');
        $this->db->where(array('course_id' => $courseid, 'subject_id' => $subjectid));
        $query = $this->db->get();

        return $query->result_array();
    }

    function getSemesterDates($semesterid) {
        $startDate = '';
        $finishDate = '';
        $this->db->select('start, finish');
        $this->db->from('semester');
        $this->db->where('semester_id', $semesterid);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $startDate = $row['start'];
                $finishDate = $row['finish'];
            }
            return($query->result_array());
        }
    }

    function getProjects($courseid, $subjectid, $semesterid) {
        $startDate = '';
        $finishDate = '';
        $query = $this->getSemesterDates($semesterid);
        if(!empty($query))
        {
        foreach ($query as $row) {
            $startDate = $row['start'];
            $finishDate = $row['finish'];
        }
        $this->db->select('a.project_id, a.project_name, a.project_desc, b.skill_id, b.skill_level');
        $this->db->from('project a');
        $this->db->order_by('a.project_id');
        $this->db->where('course_id', $courseid);
        $this->db->where('subject_id', $subjectid);
        $this->db->where('start_Date', $startDate);
        $this->db->where('finish_date', $finishDate);
        //  $this->db->where('STR_TO_DATE(start_Date, "Y-m-d h:i:s")', $startDate);
        // $this->db->where('STR_TO_DATE(finish_date, "Y-m-d h:i:s")', $finishDate);
        $this->db->join('project_skills b', 'b.project_id = a.project_id', 'right');
        $query2 = $this->db->get();

        if ($query2->num_rows() > 0) {

            $result = $query2->result_array();

            return $result;
        } else {
            return FALSE;
        }
        }
    }

    //Check if the database is empty
    function chkempty($table) {
        $this->db->select('COUNT(*)');
        $query = $this->db->get($table);
        $result = $query->row_array();
        $count = $result['COUNT(*)'];
        if ($count > 0) {

            return TRUE;
        } else {

            return FALSE;
        }
    }

    function addPreferences($data) {
        // Insert into student_preferences table
        if ($this->checkPreferencesExist($data)) {
            return TRUE;
            // $this->updatePreferences($data);
        } else {
            if ($this->db->insert('student_preferences', $data)) {
                return TRUE;
            } else {
                return FALSE;
            }
        }
    }

    function checkPreferencesExist($data) {
        $pref = array(
            'p1' => $data['project_choice_1'],
            'p2' => $data['project_choice_2'],
            'p3' => $data['project_choice_3'],
            'p4' => $data['project_choice_4'],
            'p5' => $data['project_choice_5'],
            'p6' => $data['project_choice_6'],
            'p7' => $data['project_choice_7'],
            'p8' => $data['project_choice_8'],
            'p9' => $data['project_choice_9'],
            'p10' => $data['project_choice_10']
        );
        $user = $data['user_id'];
        $prefValue = $prefRow = '';

        $this->db->select('*');
        $this->db->from('student_preferences');
        $this->db->where('user_id', $user);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $results = $query->result_array();
            foreach ($results as $key) {
                foreach ($key as $k => $value) {
                    $resultValue = $value;
                    if ($resultValue == $pref['p1'] ||
                            $resultValue == $pref['p2'] ||
                            $resultValue == $pref['p3'] ||
                            $resultValue == $pref['p4'] ||
                            $resultValue == $pref['p5'] ||
                            $resultValue == $pref['p6'] ||
                            $resultValue == $pref['p7'] ||
                            $resultValue == $pref['p8'] ||
                            $resultValue == $pref['p9'] ||
                            $resultValue == $pref['p10']) {
                        $this->updatePreferences($data, $key, $prefValue);
                        return TRUE;
                    }
                }
            }
        } else {
            return FALSE;
        }
    }

    function getPreferences($data) {
        $user = $this->session->userdata('user');
        $this->db->select('*');
        $this->db->from('student_preferences');
        $this->db->where('user_id', $user);
        $query = $this->db->get();
        if ($query->num_rows() == 1)
        {
            return $query->result_array();
        }
        elseif ($query->num_rows() > 1) {
            $results = $query->result_array();
             foreach($results as $row)
            {
            foreach ($data as $value) {
                if ($row['project_choice_1'] == $value ||
                        $row['project_choice_2'] == $value ||
                        $row['project_choice_3'] == $value ||
                        $row['project_choice_4'] == $value ||
                        $row['project_choice_5'] == $value ||
                        $row['project_choice_6'] == $value ||
                        $row['project_choice_7'] == $value ||
                        $row['project_choice_8'] == $value ||
                        $row['project_choice_9'] == $value ||
                        $row['project_choice_10'] == $value) {
                    print_r('row is '.$row.' data is');
                    return $results;
                }
            }
        }
        }
        else
        {
            return FALSE;
        }
    }

    function updatePreferences($data, $colname, $value) {
        $user = $data['user_id'];
        $this->db->where('user_id', $user);
        $this->db->where($colname, $value);
        $this->db->update('student_preferences', $data);
    }

}
