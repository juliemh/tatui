<div id="page-wrapper">

    <?php echo validation_errors(); ?>
    <form method="post" action="addproject/validate">

        <table border="0" cellpadding="0">  
            <tr>
                <td align="right"><b> Select Course </b></td>
                <td>
                    <label for="course">Course</label>
                    <!-- ------------------------------------------------ -->
                    <!-- Cascasding Dropdown section -->

                    <?php echo form_dropdown('course', $course, '', 'class="required" id="courses"'); ?>		

                    <!-- ------------------------------------------------ -->
                </td>  
            </tr> 
            <td align="right"><b> Select Subject </b></td>
            <td>

                <select id="subjects">
                    <option value="">Select</option>
                </select>
            </td>
            </tr>
            <tr>
                <td align="right"><b> Project Start Date</b></td>
                <td align="left"><input type="text" name="start_date"  value="<?php echo set_value('start_date'); ?>" /></td>
            </tr>
            <tr>
                <td align="right"><b> Project Finish Date</b></td>
                <td align="left"><input type="text" name="finish_date"  value="<?php echo set_value('finish_date'); ?>" /></td>
            </tr>
            <tr>
                <td align="right"><b> Project ID</b></td>
                <td align="left"><input type="text" name="project_id"  value="<?php echo set_value('project_id'); ?>" /></td>
            </tr>
            <tr>
                <td align="right"><b> Project Name</b></td>
                <td align="left"><input type="text" name="project_name"  value="<?php echo set_value('project_name'); ?>" /></td>
            </tr>

            <tr>
                <td align="right"><b> Project Description</b></td>
                <td align="left"> <textarea rows="4" cols="50" name="project_desc" value="<?php echo set_value('project_desc'); ?>" > </textarea></td>
            </tr>
            <tr>
                <td align="right"><b>Team Size</b></td>
                <td align="left"><input type="text" name="team_size" value="<?php echo set_value('team_size'); ?>" /></td>
                </td>
            <tr>
                <td align="right"><b>Skills</b></td>
                <td align="left"><select name="Skill_Name" value="<?php echo set_value('Skill_Name'); ?>" >
                        <?php
                        echo "<option value=''> </option>";
                        foreach ($skills as $row) {
                            echo "<option value='$row->skill_description'>$row->skill_description</option>";
                        }
                        ?>
                    </select></td>
            </tr>

        </table>
        <div class='login-username-container'> 
            <a href="pages" class="btn logoutbtn">Back to Dashboard</a>
            <input type="submit" class="btn" value="Add" name="submit"/>  
        </div>
    </form>

    <?php echo form_close(); ?>
</div>

<script type="text/javascript">
    $(document).ready(function () {


        $('#courses').change(function () {
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
