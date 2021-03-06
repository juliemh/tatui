<h2>Add a project here...</h2>    
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
    <?php
    if ($this->session->flashdata()) {
       $addedMsg = $this->session->flashdata('addedMsg');
        $msgError = $this->session->flashdata('msgError');
        
        if (count($addedMsg) > 0) {
            foreach ($addedMsg as $row => $value) {
                {
                ?>
                <div class="alert alert-success">
                    <button class="close" data-dismiss="alert">x</button>
            <?php echo($value); ?>
                </div>
                    <?php
                }
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
<form id="addproject" method="post" action="./addproject/validate">

    <table>  
        <tr>
            <td align="right"><b> Select Course </b></td>
            <td>
                <label for="course"></label>
                <!-- ------------------------------------------------ -->
                <!-- Cascasding Dropdown section -->

<?php
echo form_dropdown('course', $course, '', 'required id="course" ');
?>
                <!-- ------------------------------------------------ -->
            </td>                 <!--  </tr>  -->
            <td align="right"><b> Select Subject </b></td>
            <td>

                <select id="subjects" name="subject" required ">
                        <option value="" selected>Select</option>
                </select>
            </td>
        </tr>

        <tr>
            <td align="right"><b> Project Start Date</b></td>
            <td align="left">    <div class="input-group date">
                    <input type="text" class="form-control" name="startdate"  required />
                    <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                </div></td>
            <!--    </tr>
                <tr> -->
            <td align="right"><b> Project Finish Date</b></td>
            <td align="left"> <div class="input-group date">
                    <input type="text" class="form-control" name="finishdate" required />
                    <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                </div></td>
        </tr> 
        <tr>
            <td align="right"><b> Project ID</b></td>
            <td align="left"><input type="text" name="project_id" required /></td>
            <!--     </tr>
                 <tr> -->
            <td align="right"><b> Project Name</b></td>
            <td align="left"><input type="text" name="project_name" required /></td>
        </tr>

        <tr>
            <td align="right"><b> Project Description</b></td>
            <td align="left" colspan="3"> <textarea rows="4" cols="100" name="project_desc" required="required" ></textarea></td>
        </tr>
        <tr>
            <td align="right"><b>Team Size</b></td>
            <td align="left"><input type="number" name="team_size" required /></td>
            </td>
    </table>
<?php echo form_error('skillcheck[]'); ?>
    <div class="skilltable">
        <table width="60%">
            <tr>
                <th colspan="2" text-align="centre">Skill Name</th>
                <th align="right">Beginner</th>
                <th align="right">Medium Level</th>
                <th align="right">Expert</th>
            </tr>
<?php
foreach ($skills as $row) {
    ?> 
                <tr>
                    <td><input type="checkbox" name="skillcheck[]" id="<?php echo $row['skill_id']; ?>" value="<?php echo $row['skill_id']; ?>" /></td>
                    <td><label for="<?php echo $row['skill_id']; ?>"><?php echo $row['skill_id']; ?></label></td>
                    <td><input type="radio" name="<?php echo $row['skill_id']; ?>" value="beginner" id="<?php echo $row['skill_id']; ?>" /></td>
                    <td><input type="radio" name="<?php echo $row['skill_id']; ?>" value="medium" id="<?php echo $row['skill_id']; ?>" /></td>
                    <td><input type="radio" name="<?php echo $row['skill_id']; ?>" value="expert" id="<?php echo $row['skill_id']; ?>" /></td></tr>
<?php }
?>
        </table>
    </div>

    <div class='login-username-container'>
        <a href="pages" class="btn logoutbtn">Back to Dashboard</a>
        <input type="submit" value="Add" name="submit" class="btn logoutbtn"  />
<?php echo form_reset('reset', 'Reset', array('class' => 'btn logoutbtn')); ?>
      <!--  <input type="reset" value="Reset" name="reset" class="btn logoutbtn"/>   -->                
    </div>
</form>

<script type="text/javascript">
    $(document).ready(function () {

        $('#course').change(function () {
            /*dropdown post */
            $.ajax({
                url: "<?php echo base_url(); ?>index.php/addproject/getSubjects",
                data: {course: $(this).val()},
                type: "POST",
                success: function (data) {

                    $("#subjects").html(data);
                }

            });

        });

    });



</script>
<script type="text/javascript">

    $('.input-group.date').datepicker({
        format: "yyyy-mm-dd"
    });

</script>

<script type="text/javascript">

        $('input:radio').click(function () {
        value = $(this).attr('name');

        var chk = $('input:checkbox[value="' + value + '"]').prop('checked', true);
        if (!chk)
        {
            $('input:checkbox[value="' + value + '"]').prop('checked', true);
        }

    }
    );

</script>
