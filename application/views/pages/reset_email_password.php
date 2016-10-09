<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->helper(array('form','url'));
echo validation_errors();


echo "<h2>Reset Email Password</h2>";
echo form_open('login/email_reset_password_validation');
echo form_input('email',$this->input->post('email'));
echo form_submit('submit','Email to Reset Password');
echo form_close();