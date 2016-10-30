<div id="page-wrapper">
    <div class="formcontainer">
        <h2>Add Course details here...</h2>
        <form method="post" action="./addcourse/validate" id="addcourse">
            <div class="login-container">

                <div class='login-username-container'>
                    <label>Course ID</label>
                    <input autofocus  type='text' name="courseid" required>
                </div>
                <div class='login-username-container'>
                    <label>Course Name</label>
                    <input  type='text' name="coursename" size=100 required>
                </div>
                <div class='login-username-container'>
                    <label>Description</label>
                    <input  type='text' name="description" size=100 required>
                </div>
                <div class='login-username-container'>
                    <a href="pages" class="btn logoutbtn">Back to Dashboard</a>
                    <button name="submit" class="btn logoutbtn">  Submit  </button>                  
                </div>
            </div>
        </form>
    </div>
    <div class="message-container">
         <?php
        $msg1 = $this->session->flashdata('msg1');
        if ((isset($msg1)) && (!empty($msg1))) {
            ?>
            <div class="alert alert-danger">
                <button class="close" data-dismiss="alert">x</button>
            <?php print_r($msg1); ?>
            </div>
            <?php }
        ?>

        <?php
        $msg = $this->session->flashdata('msg');
        if ((isset($msg)) && (!empty($msg))) {
            ?>
            <div class="alert alert-success">
                <button class="close" data-dismiss="alert">x</button>
            <?php print_r($msg); ?>
            </div>
            <?php }
        ?>


    </div>
</div>


