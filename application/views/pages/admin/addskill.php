
<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div id="page-wrapper">

    <?php
    $this->load->helper(array('form', 'url'));

    echo validation_errors();


    echo "<h2>Add Skill</h2>";

    echo form_open('addskill/skill_validate');
    $skillid = array(
        'name' => 'skillid',
        'value' => set_value('skillid'),
        'size' => '25'
    );
    ?>
    <div class="login-container">

        <div class='login-username-container'>
            <?php
            echo form_label('Skill Id ');
            echo form_input($skillid);
            ?>
        </div>
        <div class='login-username-container'>
            <?php
            $skillname = array(
                'name' => 'skillname',
                'value' => set_value('skillname'),
                'size' => '25'
            );
            echo form_label('Skill Name ');
            echo form_input($skillname);
            ?>
        </div>
        <div class='login-username-container'> 
            <?php
            $skilldescription = array(
                'name' => 'skilldescription',
                'value' => set_value('skilldescription'),
                'size' => '60'
            );
            echo form_label('Skill Description ');
            echo form_input($skilldescription);
            ?>
        </div>
        <div class='login-username-container'>
            <?php
            $skillgroup = array(
                'programming' => 'Programming',
                'webdesign' => 'WebDesigning ',
                'database' => 'Database Platform',
                'mobiledevelopment' => 'Mobile Development',
            );
            echo form_label('Skill Group');
            echo form_dropdown('skillgroup', $skillgroup);
            ?>
        </div>
        <div class='login-username-container'>
            <?php
            echo form_submit('submit', 'Add Skill');
            echo form_submit('submit', 'Delete Skill');
            echo form_close();
            ?>
        </div>

    </div>


