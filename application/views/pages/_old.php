<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->helper(array('form','url'));

echo $message;
echo validation_errors();


echo "<h2>Login</h2>";
echo form_open('login');
$userid = array(
    'name' => 'userid',
    'value' => set_value('userid'),
    'size' => '25'
    );
echo form_label('User Name ');
echo form_input($userid);
echo "<br>";
$password = array(
    'name' => 'password', 
    'size' => '25'
    );
echo form_label('Password ');
echo form_input($password);
echo "<br>";
echo form_submit('submit','login');
echo form_close();
