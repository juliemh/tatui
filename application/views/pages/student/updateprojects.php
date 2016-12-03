<h2>Update your projects here...</h2>
<div class="message-container">

    <?php
 //   $user_id = $this->session->userdata('user');
    $msg1 = $this->session->flashdata('msg1');
    if ((isset($msg1)) && (!empty($msg1))) {
        ?>
        <div class="alert alert-danger">
            <button class="close" data-dismiss="alert">x</button>
            <?php print_r($msg1); ?>
        </div>
        <?php
    }

    $msg = $this->session->flashdata('msg');
    if ((isset($msg)) && (!empty($msg))) {
        ?>
        <div class="alert alert-success">
            <button class="close" data-dismiss="alert">x</button>
            <?php print_r($msg); ?>
        </div>
        <?php
    }

    if ($this->session->flashdata()) {
        $addedMsg = $this->session->flashdata('addedMsg');
        $msgError = $this->session->flashdata('msgError');

        if (count($addedMsg) > 0) {
            foreach ($addedMsg as $row => $value) { 
                    ?>
                    <div class="alert alert-success">
                        <button class="close" data-dismiss="alert">x</button>
                        <?php echo($value); ?>
                    </div>
                    <?php
                }
            }
        
        if (count($msgError) > 0) {
            foreach ($msgError as $row => $value) {
                ?>
                <div class="alert alert-danger">
                    <button class="close" data-dismiss="alert">x</button>
                    <?php echo($value); ?>
                </div>
                <?php
            }
        }
    }

    ?>
</div>
<div class="formcontainer">
    <form id="registerpref" method="post" action="./registerprojects/validate">
        
        <table>
            <tr>
                <td align="right"><b>Course </b></td>
                <td><select id="course" name="course">
                    <option value="  
                           <?php echo $this->session->flashdata('course'); ?>" selected=""><?php echo $this->session->flashdata('course'); ?>
                    </option>
                    </select>
                    <td align="right"><b>  Subject </b></td>
                <td>
                    <select id="subject" name="subject">
                            <option value=" <?php echo $this->session->flashdata('subject'); ?>" selected=""><?php echo $this->session->flashdata('subject'); ?>
                    </option>
                    </select>
                        </td>
                <td align="right"><b> Semester </b></td>
                <td>
                    <select id="semester" name="semester">
                        <option type="text" value=" <?php echo $this->session->flashdata('semester'); ?>" selected=""><?php echo $this->session->flashdata('semester'); ?>
                    </option>
                    </select>
                        </td>    
            </tr>
        </table>
        <div id="projects">
            <table width="90%" id="project">      
            </table>
        </div>
        <div>
            <h4>These are people you nominated to work with. </h4>
            <div class="login-container">
                <div class="login-username-container">
            <?php
            $mates = $this->session->userdata('mates');
            foreach ($mates as $row) {
                ?>
                        <label for="pref">Team mate </label>      
                        <input name="pref[]" id="pref" value="<?php echo $row ?>" />
                    <?php }
                    ?>              
                </div>
            </div>
        </div>
        <div class='login-username-container'>
            <a href="pages" class="btn logoutbtn">Back to Dashboard</a>
         <!--   <input  value="Register" name="submit" onclick="getParams();" class="btn logoutbtn"  />      -->
            <button type="submit" id="update" class="btn logoutbtn">Update</button>
        </div>
    </form>
</div>     
<script type="text/javascript">
    $(document).ready(function () {       
                var postData = {
                    course: $('#course').val(),
                    subject: $('#subject').val(),
                    semester: $('#semester').val()
                };
             $.ajax({
                url: "<?php echo base_url(); ?>index.php/registerprojects/getUserData",
                data: postData,
                type: "POST",
               success: function (data) {
                          $("#projects").append(data);
                    }
                });
            
    });
    </script>
<script type="text/javascript">
    function runme(name) {
        var value = $(name).attr('name');
        var chk = $('input:checkbox[value="' + value + '"]').prop('checked', true);
        if (!chk)
        {
            $('input:checkbox[value="' + value + '"]').prop('checked', true);
        }
    }
</script>
<script type="text/javascript">
    