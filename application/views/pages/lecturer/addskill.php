  <div class="formcontainer">
        <h2>Add a new skill  here...</h2>
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

        <form method="post" action="./addskill/validate" id="addskill">
            <div class="login-container">
                <div class='login-username-container'>
                    <label>Skill ID</label>
                    <input autofocus  type='text' name="skillid" required>
                </div>
                <div class='login-username-container'>
                    <label>Skill Description</label>
                    <input  type='text' name="description" required>
                </div>
                <div class='login-username-container'>
                    <label>Category</label>
                    <select  type='text' name="category" required>
                        <option>Select</option>
                    <option name="programming" value="Programming">Programming</option>
                    <option name="webdesign" value="Webdesign">Web Design</option>
                    <option name="database" value="Database">Database</option>
                    <option name="mobile" value="Mobile Development">Mobile Development</option>
                    </select>
                </div>
               
                <div class='login-username-container'>
                    <a href="pages" class="btn logoutbtn">Back to Dashboard</a>
                    <button name="submit" class="btn logoutbtn">  Submit  </button>
                </div>   
            </div>
        </form>

      
