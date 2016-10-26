
  <div id="page-wrapper">


<div class="formcontainer">
    <h2>Add Course details here...</h2>
    <form method="post" action="./add_course/validate" id="addcourse">
        <div class="login-container">

            <div class='login-username-container'>
                <label>Course ID</label>
                <input autofocus placeholder='courseid' type='text' name="courseid" required>
            </div>
            <div class='login-username-container'>
                <label>Course Name</label>
                <input placeholder='coursename' type='text' name="coursename" size=100 required>
            </div>
            <div class='login-username-container'>
                <label>Description</label>
                <input placeholder='description' type='text' name="description" size=100 required>
            </div>
            <div class='login-username-container'>

                <button name="submit" class="btn logoutbtn">  Submit  </button>
            </div>
            <div class='login-username-container'>
                 <a href="admin" class="btn logoutbtn">Dashboard</a>
            </div>
        </div>
    </form>
    <?php echo form_close(); ?>

    <div class="message-container">

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
