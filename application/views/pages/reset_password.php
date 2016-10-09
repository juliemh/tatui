<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->helper(array('form','url'));


$reset_email = $this->uri->segment(2);
echo validation_errors();
echo "<h2>Reset Password</h2>";
echo form_open('login/reset_password_validation');
echo form_hidden('reset_email',set_value('reset_email',$reset_email));
echo form_password('password',$this->input->post('password'));
echo form_password('confirm_password',$this->input->post('confirm_password'));
echo form_submit('submit','Email to Reset Password');
echo form_close();