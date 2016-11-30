<?php

class Addsemester_model extends CI_Model {

    function validateSem($semesterid) {
        $this->db->select('semester_id');
        $this->db->where('semester_id', $semesterid);
        $query = $this->db->get('semester');

        if ($query->result_array()) {

            return TRUE;
        } else {
            return FALSE;
        }
    }
        function add_semester($semester) {
            if ($this->db->insert('semester', $semester)) {
                return TRUE;
            } else {
                return FALSE;
            }
        }

    }
    