<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Addskill extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //$this->load->library('session');
        $this->load->helper(array('form', 'url', 'html'));
        $this->load->library('form_validation');        
    }
     public function call_page() {  
        $usertype = 'admin';
		// page data to be passed will be usertype by default
		$data = array(
			'page_title' => 'Add Skills',
			'title' => $usertype,
			'message' => '',
			'includes' => 'pages/'.$usertype.'/addskill'
			   );
        $this->load->view('templates/header', $data);
        $this->load->view( 'pages/'.$usertype.'/nav');
		$this->load->view('templates/content');
		$this->load->view('templates/footer');
		
    }
    // checks login using in built validation
 
   
   public function index()
    {

         if ($this->form_validation->run() == FALSE) {
		 
          $this->call_page();
         }
        
    }
    public function skill_validate(){

      $this->load->library('form_validation');
      $this->form_validation->set_rules('skillid', 'skillid', 'required|max_length[15]');
      $this->form_validation->set_rules('skillname', 'SkillName', 'required|max_length[25]');
      $this->form_validation->set_rules('skilldescription', 'skilldescription', 'required|max_length[70]');
      $this->form_validation->set_rules('skillgroup', 'skillgroup', 'required');
      
      if($this->form_validation->run()){
    
        $this->load->model('Getskills_model', '', TRUE);
        $skill = $this->input->post('skillid');
        $skillExisted = $this->Getskills_model->getskill($skill);
        if($skillExisted){

          echo "Skill Already Existed";
          $this->load->helper('form');
          $this->load->view('pages/AddSkill');

        }
        else{
          $data = array(
          'skill_id' =>  $this->input->post('skillid'),
          'skill_category' => $this->input->post('skillgroup'),   
          'skill_description' => $this->input->post('skilldescription')
         );
        
         $inserted = $this->Getskills_model->insert_skill($data);
          if($inserted){

            echo "Inserted Successfully";
			$this->load->view('addSkill');		
          }        
          else{

            echo  "Please contact Support Team";
          }
      }
        
    }
    else{

       echo  "Please contact Support Team";
    }

  }
}
