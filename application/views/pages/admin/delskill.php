<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->helper(array('form','url'));

echo validation_errors();


echo "<h2> Delete Skill</h2>";

echo form_open('skill/delskill');
$skillid = array(
    'name' => 'skillid',
    'value' => set_value('skillid'),
    'size' => '25'
    );
echo form_label('Skill Id ');
echo form_input($skillid);
echo "<br>";
echo "<br>";
echo form_submit('submit','Delete Skill');
echo form_close();



