
<div id="page-wrapper">

    <?php echo validation_errors(); ?>
    <form method="post" action="./addproject/validate">

        <table border="0" cellpadding="0">  
            <tr>
                <td align="right"><b> Select Course </b></td>
                <td>
                    <label for="courseid">Course</label>
                    <!-- ------------------------------------------------ -->
                    <!-- Cascasding Dropdown section -->

                    <?php echo form_dropdown('courses', $courses, '', 'class="required" id="courses"'); ?>		

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
                <td align="right"><b>Select Lecturer</b></td>
                <td><select name="project_lecturer" value="<?php echo set_value('project_lecturer'); ?>" >
                        <?php
                        echo "<option value=''> </option>";
                        foreach ($results as $row) {
                            echo "<option value='$row->Firstname$row->Lastname'>$row->Firstname $row->Lastname</option>";
                        }
                        ?>
                    </select> </td>
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

                </td>

        </table>

        <p>
            <input type="submit" value="Add" name="submit"/>
            <input type="reset" value="Reset" name="reset"/>
        </p> 
    </form>

<div class='login-username-container'>
                 <a href="admin" class="btn logoutbtn">Back to Dashboard</a>
            </div>
        </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {


        $('#courses').change(function () {
            /*dropdown post */
            $.ajax({
                url: "<?php echo base_url(); ?>index.php/addingproject/getSubjects",
                data: {courseid: $(this).val()},
                type: "POST",
                success: function (data) {

                    $("#subjects").html(data);
                }

            });

        });

    });

</script>
