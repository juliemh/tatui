<?php

class Model_Adding_Project extends CI_Model {

    // Iterate through the courses table and add the courseid
    // to an array
    function getCourses() {
        $this->db->from('course');
        $this->db->order_by('course_id');
        $result = $this->db->get();
        $drop = array();
        if ($result->num_rows() > 0) {
            foreach ($result->result_array() as $row) {
                $drop[$row['course_id']] = $row['course_id'];
            }
        }

        return $drop;
    }

    function getSubjectsByCourse($course = string) {
        $this->db->select('subject_id, subject_name');
        $this->db->where('course_id', $course);
        $query = $this->db->get('subject');

        return $query;
    }

    function getAllLecturer() {
        $query = $this->db->query('select a.user_id, a.firstname, a.lastname from user a, access_type b where b.access_type = "lecturer" and a.user_id = b.user_id');

        if ($query->result()) {

            return $query->result();
        }
    }

   //To get all Skills//
		function getAllSkills()
		{
        
		$query=$this->db->query('SELECT * FROM skill_dictionary');
		$rows=$query->result();
		$dataone=array('skills'=>$rows);
		return $query->result();   
		}

    function add_project($data) {

        $this->db->insert('projects', $data);
    }

    function add_project_skills($data) {
        $this->db->insert('project_skills', $data);
    }

}
