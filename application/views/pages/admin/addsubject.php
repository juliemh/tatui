
   		<!-- Navigation -->
                <nav>
                    <div class="navContainer">
                    <div class="dropdown">
			<button class="dropbtn">Admin Menu</button>
			<div class="dropdown-content">
				<a href="#">Add Lecturer</a> 
                                <a href="addcourse">Add Course</a>
                                <a href="addsubject">Add Subject</a>
                                <a href="#">Add Project</a>
                                <a href="#">Add Skill</a>
                                <a href="#">Import Students</a>
			</div>

                    </div>
           </div>
	<!-- /.navbar-static-side -->
	</nav>
    <div class="logout">
                <a href="logout" class="btn logoutbtn">Click me to Logout</a>
     </div>
            <div id="page-wrapper">
<?php echo form_open("addsubject/index", $attributes);?>
<div class="formcontainer">
    <h2>Add Subjects  here...</h2>
    <form method="post" action="./addcourse/validate" id="login">
    <div class="login-container">
   
      <div class='login-username-container'>
        <label>Subject ID</label>
        <input autofocus placeholder='Courseid' type='text' name="courseid" required>
      </div>
    <div class='login-username-container'>
        <label>Description</label>
        <input placeholder='Description' type='text' name="description" size=100 required>
    </div>
        
    <div class='login-username-container'>
        
        <label>Description</label>
        <input placeholder='Description' type='text' name="description" size=100 required>
    </div>
        
        <div class="logon-username-container" >
            
            <label for="courses">Course</label>
           <?php $attributes = 'class="form-control" id="courses"';
            echo form_dropdown('courses', $courses, set_value('courses'), $attributes); ?>
        </div>
        <div class='login-username-container'>
        <button>Submit</button>
        <button >Cancel</button>

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