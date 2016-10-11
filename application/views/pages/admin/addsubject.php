 <div id="page-wrapper">
 <?php 
        echo form_open("addsubject/index");?>
<div class="formcontainer">
    <h2>Add Subjects  here...</h2>
    <form method="post" action="./addsubject/validate" id="login">
    <div class="login-container">
   
      <div class='login-username-container'>
        <label>Subject ID</label>
        <input autofocus placeholder='Subjectid' type='text' name="subjectid" required>
      </div>
    <div class='login-username-container'>
        <label>Description</label>
        <input placeholder='Description' type='text' name="description" size=100 required>
    </div>
        
           
        <div class="logon-username-container" >
            
               
         <label for="courseid">Category</label>
            <?php 
            echo form_dropdown('courses', $courses, set_value('courses')); ?>
            <span class="text-danger"><?php echo form_error('courses'); ?></span>
            
        <div class='login-username-container'>
        <button>Submit</button>
        <button >Cancel</button>

      </div>
    </div>
</form>



<?php $msg = $this->session->flashdata('msg');
if ((isset($msg)) && (!empty($msg))) { ?>
    <div class="alert alert-success">
        <button class="close" data-dismiss="alert">x</button>
    <?php print_r($msg); ?>
    </div>
<?php } ?>
     </div>
    




   
    
</div>