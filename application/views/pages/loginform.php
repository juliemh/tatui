<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->helper(array('form','url'));

//echo $message;




echo form_open('login');
$userid = array(
    'name' => 'userid',
    'value' => set_value('userid'),
    'size' => '25',
    'placeholder' => "Please enter username"
    );
echo form_label('Email Address');
echo form_input($userid);
echo "<br>";
$password = array(
    'name' => 'password', 
    'size' => '25',
    'placeholder' => 'Please enter password'
    );
echo form_label('Passwor ');
echo form_password($password);
echo "<br>";
echo form_submit('submit','Login');

echo validation_errors();
echo form_close();
