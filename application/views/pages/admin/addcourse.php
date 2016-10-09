<div class="formcontainer">
    <h2>Add Course details here...</h2>
    <form method="post" action="./addcourse/validate" id="login">
    <div class="login-container">
   
      <div class='login-username-container'>
        <label>Course ID</label>
        <input autofocus placeholder='Courseid' type='text' name="courseid" required>
      </div>
    <div class='login-username-container'>
        <label>Description</label>
        <input placeholder='Description' type='text' name="description" size=100 required>
    </div>
        <div class='login-username-container'>
        <button>Submit</button>
        <button class="js-toggle-login" type="button">Cancel</button>

      </div>
    </div>
</form>



 <div class="message-container">
    <?php $msg = $this->session->flashdata('msg1');
if ((isset($msg)) && (!empty($msg))) { ?>
    <div class="alert alert-danger">
        <button class="close" data-dismiss="alert">x</button>
    <?php print_r($msg); ?>
    </div>
<?php } ?>



<?php $msg = $this->session->flashdata('msg');
if ((isset($msg)) && (!empty($msg))) { ?>
    <div class="alert alert-success">
        <button class="close" data-dismiss="alert">x</button>
    <?php print_r($msg); ?>
    </div>
<?php } ?>
     </div>
    
</div>