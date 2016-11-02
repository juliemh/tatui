<div id="page-wrapper">
<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->helper(array('form','url'));

echo $message;
echo validation_errors();

echo "<h2>Login</h2>";
echo form_open('pages');
$userid = array(
    'name' => 'userid',
    'value' => set_value('userid'),
    'size' => '25'
    );
?>
     <div class="login-container">

            <div class='login-username-container'>
<?php
                echo form_label('User Name ');
echo form_input($userid); ?>
                </div>
         
<?php
$password = array(
    'name' => 'password', 
    'size' => '25',
    'type' => 'password'
    );
?>
         <div class='login-username-container'>
<?php
             echo form_label('Password ');
echo form_input($password);
?>
         </div>
<?php
echo form_submit('submit','Login');
echo form_close();
?>
     </div>
