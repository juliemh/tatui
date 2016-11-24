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
        print_r('course is ' . $courseid);
        print_r(' subject is ' . $subjectid);
        $this->db->select('semester_id');
        $this->db->from('course_subject');
        $this->db->where(array('course_id' => $courseid, 'subject_id' => $subjectid));
        $query = $this->db->get();
        print_r($query->result_array());
        return $query->result_array();
    }

    function getProjects($course, $subject, $semester) {

        $this->db->select('start');
        $this->db->from('semester');
        $this->db->where('semester_id', $semester);
        $query = $this->db->get()->row();
        $startDate = $query->start;

        $this->db->select('finish');
        $this->db->from('semester');
        $this->db->where('semester_id', $semester);
        $query1 = $this->db->get()->row();
        $finishDate = $query1->finish;

        $this->db->select('a.project_id, a.project_name, a.project_desc, b.skill_id, b.skill_level');
        $this->db->from('project a');
        $this->db->order_by('a.project_id');
        $this->db->where('course_id', $course);
        $this->db->where('subject_id', $subject);
        $this->db->where('start_Date', $startDate);
        $this->db->where('finish_date', $finishDate);
        //  $this->db->where('STR_TO_DATE(start_Date, "Y-m-d h:i:s")', $startDate);
        // $this->db->where('STR_TO_DATE(finish_date, "Y-m-d h:i:s")', $finishDate);
        $this->db->join('project_skills b', 'b.project_id = a.project_id', 'right');
        $query2 = $this->db->get();

        if ($query2->num_rows() > 0) {
            return $this->mergeSkills($query2->result_array());
        } else {
            return FALSE;
        }
    }

    function mergeSkills($query) {

        $previousid = $query[0]['project_id'];
        $previousName = $query[0]['project_name'];
        $previousDesc = $query[0]['project_desc'];

        $skill = '';
        $array = array();
        foreach ($query as $q) {
            //loop through the array and merge the skills into one field.
            //set a previous field to compare the project id to
            //if the current project id is the same, concatenate the skills
            //else set the array values and set previous fields 

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
            $this->updatePreferences($data);
        } else {
            if ($this->db->insert('student_preferences', $data)) {
                return TRUE;
            } else {
                return FALSE;
            }
        }
    }

    function checkPreferencesExist($data) {
        $p1 = $data['project_choice_1'];
        $user = $data['user_id'];
        $this->db->select('*');
        $this->db->from('student_preferences');
        $this->db->where('user_id', $user);
        $this->db->where('project_choice_1', $p1);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function updatePreferences($data) {
        $p1 = $data['project_choice_1'];
        $user = $data['user_id'];
        $this->db->where('user_id', $user);
        $this->db->where('project_choice_1', $p1);
        $this->db->update('student_preferences', $data);
    }

}
