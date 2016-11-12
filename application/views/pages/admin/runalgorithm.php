<form method="post" action="runalgorithm.php">

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
                <td align="right"><b> Select Semester/Study Period </b></td>
                <td>
                    <label for="semester">Semester</label>
                    <!-- ------------------------------------------------ -->
                    <!-- Cascasding Dropdown section -->

                    <?php echo form_dropdown('semester', $semester, '', 'class="required" id="semester"'); ?>		

                    <!-- ------------------------------------------------ -->
                </td>  
            </tr> 

        </table>
        <div class='login-username-container'> 
            <a href="pages" class="btn logoutbtn">Back to Dashboard</a>
            <input type="submit" class="btn logoutbtn" value="Add" name="submit"/>  
        </div>
    </form>

    <?php echo form_close(); ?>


<script type="text/javascript">
    $(document).ready(function () {


        $('#courses').change(function () {
            /*dropdown post */
            $.ajax({
                url: "<?php echo base_url(); ?>index.php/runalgorithm/getSubjects",
                data: {course: $(this).val()},
                type: "POST",
                success: function (data) {

                    $("#subjects").html(data);
                }

            });

        });

    });

</script>
