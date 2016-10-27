<div id="page-wrapper">

    <div class="formcontainer">
        <h2>Add Subjects  here...</h2>
        <form method="post" action="./addsubject/validate" id="addsubject">
            <div class="login-container">

                <div class='login-username-container'>
                    <label>Subject ID</label>
                    <input autofocus  type='text' name="subjectid" required>
                </div>
                 <div class='login-username-container'>
                    <label>Subject Name</label>
                    <input  type='text' name="subjectname" size=100 required>
                </div>
                
                <div class='login-username-container'>
                    <label>Description</label>
                    <input  type='text' name="description" size=100 required>
                </div>


                <div class="logon-username-container" >


                    <label for="course_id">Select a Course</label>
                    <?php echo form_dropdown('course', $course); ?>
                    <span class="text-danger"><?php echo form_error('course'); ?></span>
                </div>

                <div class='login-username-container'>
                    <button>Submit</button>
                </div>
                
                <div class='login-username-container'>
                    <a href="pages" class="btn logoutbtn">Back to Dashboard</a>
                </div>   
            </div>
        </form>



        <?php $msg = $this->session->flashdata('msg');
        if ((isset($msg)) && (!empty($msg))) {
            ?>
            <div class="alert alert-success">
                <button class="close" data-dismiss="alert">x</button>
                <?php print_r($msg); ?>
            </div>
        <?php } ?>
    </div>







</div>
