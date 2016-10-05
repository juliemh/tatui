<?php if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );

class Login extends CI_Controller {
	public function __construct() {
		parent::__construct ();
		
		$this->load->model ( 'login/login_model' );
	}
	/*
	 * Showing Login page here
	 */
	function index() {
		$this->load->view ( 'login/header' );
                $this->load->view ( 'login/content' );
                $this->load->view ('login/footer');
	}
	
	/**
	 * check the username and the password with the database
	 *
	 * @return void
	 */
	function validate() {
		$email = $this->input->post ( 'email' );
		$password = $this->input->post ( 'password' );
		
		$is_valid = $this->login_model->validate ($email, $password );
		
		if ($is_valid)/*If valid username and password set */
         {
			$get_id = $this->login_model->get_id ( $email, $password );
			
			foreach ( $get_id as $val ) {
				$userid = $val->UserID;
				$email = $val->Email;
				$password = $val->Password;
				$type = $val->Type;
				$firstname = $val->Firstname;
				$surname = $val->Surname;
				
				if ($type == 'admin') {
					$data = array (
							'admin_first' => $firstname,
							'admin_last' => $surname,
							'admin_password' => $password,
							'admin_id' => $userid,
							'admin_type' => $type,
							'admin_email' => $email,
							'admin_id' => $userid,
							'admin_is_logged_in' => true 
					);
					$this->session->set_userdata ( $data ); /* Here setting the Admin datas in session */
					redirect ( 'admin/dashboard' );
				} elseif ($type == 'lecturer') {
					$data = array (
							'lecturer_first' => $firstname,
							'lecturer_last' => $surname,
							'lecturer_password' => $password,
							'lecturer_id' => $userid,
							'lecturer_type' => $type,
							'lecturer_email' => $email,
							'lecturer_is_logged_in' => true 
					);
					$this->session->set_userdata ( $data ); /* Here setting the staff datas values in session */
					redirect ( 'lecturer/dashboard' );
				} else {
					$data = array (
							'student_first' => $firstname,
							'student_last' => $surname,
							'student_password' => $password,
							'student_id' => $userid,
							'student_type' => $type,
							'student_email' => $email,
							'student_is_logged_in' => true 
					);
					$this->session->set_userdata ( $data ); /* Here setting the staff datas values in session */
					redirect ( 'student/dashboard' );
				}
			}
		} else // incorrect username or password
{
			
			$this->session->set_flashdata ( 'msg1', 'Username or Password Incorrect!' );
			redirect ( 'login' );
		}
	}
	
	/**
	 * Unset the session, and logout the user.
	 *
	 * @return void
	 */
	public function admin_logout() {
		$array_items = array (
				'admin_first',
				'admin_last',
				'admin_password',
				'admin_email',
				'admin_type',
				'admin_id',
				'admin_is_logged_in' 
		);
		
		$this->session->unset_userdata ( $array_items );
		$this->session->set_flashdata ( 'msg', 'Admin is Signed Out Now!' );
		redirect ( 'login' );
	}
	public function student_logout() {
		$array_items = array (
				
				'student_first',
				'student_last',
				'student_password',
				'student_email',
				'student_type',
				'student_id',
				'student_is_logged_in' 
		);
		
		$this->session->unset_userdata ( $array_items );
		$this->session->set_flashdata ( 'msg', 'Student is Logged  Out Now!' );
		redirect ( 'login' );
	}
	public function lecturer_logout() {
		$array_items = array (
				
				'lecturer_first',
				'lecturer_last',
				'lecturer_password',
				'lecturer_email',
				'lecturer_type',
				'lecturer_id',
				'lecturer_is_logged_in' 
		);
		
		$this->session->unset_userdata ( $array_items );
		$this->session->set_flashdata ( 'msg', 'Lecturer is Logged  Out Now!' );
		redirect ( 'login' );
	}
}