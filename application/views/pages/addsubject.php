
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
                                <a href="admin">Dashboard</a>
			</div>

                    </div>
           </div>

	</nav>
<div id="page-wrapper">

<div class="formcontainer">
    <h2>Add Subjects  here...</h2>
    <form method="post" action="./addsubject/validate" id="addsubject">
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
            echo form_dropdown('courses', $courses); ?>
            <span class="text-danger"><?php echo form_error('courses'); ?></span>
        </div>
            
        <div class='login-username-container'>
        <button>Submit</button>
        <a href="admin"><button >Back</button></a>

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