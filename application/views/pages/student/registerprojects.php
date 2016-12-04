 <h2>Register for projects here...</h2>

    <form id="registerpref" method="post" action="./registerprojects/validate">
        <table>
            <tr>
                <td align="right"><b> Select Course </b></td>
                <td>
                    <label for="course"></label>
                    <select name="course" id="course" required> 
                        <option selected="selected">Select a course</option>
                        <?php foreach ($course as $c) {
                            ?>
                            <option name="<?php echo $c['course_id']; ?>" value="<?php echo $c['course_id']; ?>">
                                <?php echo $c['course_name']; ?>
                            </option>
                        <?php }
                        ?>
                    </select>
                <td align="right"><b> Select Subject </b></td>
                <td>
                    <select id="subject" name="subject" required>
                        <option value="" selected>Select</option>
                    </select>
                </td>
                <td align="right"><b> Select Semester </b></td>
                <td>
                    <select id="semester" name="semester" required>
                        <option value="" selected>Select</option>
                    </select>
                </td>    
            </tr>
        </table>
        <div id="projects">
            <table width="90%" id="project">
<!--                              <tr><th></th><th>Project ID</th><th>Project Name</th>
                                <th>Project Description</th><th>Skills Required</th><th>Preference</th></tr>
                              <tr id="project">
                              </tr>  -->               
            </table>
        </div>
       <div id="teammate">
                    <?php 
                    if($this->session->userdata('teammates')){
                    ?>
                        <h4>These are people you nominated to work with. </h4>
            <div class="login-container">
                <div class="login-username-container">
            <?php
            $teammates = $this->session->userdata('teammates');
              foreach ($teammates as $row) {
                ?>
                        <label for="pref">Team mate </label>      
                        <input name="pref[]" id="pref" value="<?php echo $row ?>" />
                    <?php }
              
                    ?>              
                </div>
            </div>
                <?php } else {
     ?>
                         <div id="teammate">
            <h4>If there are people you want to work with please state their RMIT id's here.  Maximum of 3 </h4>
            <div class="login-container">
                <div class="login-username-container">
 
                    <label for="pref1">Team mate 1</label>      
                    <input name="pref[]" />
                    <label for="pref2">Team mate 2</label>
                    <input name="pref[]" id="pref2" />
                    <label for="pref3">Team mate 3</label>
                    <input name="pref[]" id="pref3" />
                </div>
            </div>
            
        </div>
              <?php
            } ?>          
       </div>
        <div class='login-username-container'>
            <a href="pages" class="btn logoutbtn">Back to Dashboard</a>
            <input type="submit" value="Register" name="submit"  class="btn logoutbtn"  />      
        </div>
    </form>

    </div> 
<script type="text/javascript">
    $(document).ready(function () {
        var team = $('#teammate');
        var proj = $('#projects');
        team.hide();
        proj.hide();
        $('#course').change(function () {
            /*dropdown post */
            $.ajax({
                url: "<?php echo base_url(); ?>index.php/registerprojects/getSubjects",
                data: {course: $(this).val()},
                type: "POST",
                success: function (data) {

                    $("#subject").html(data);
                }

            });
        });
        $('#subject').change(function () {
            /*dropdown post */
            var postData = {
                course: $('#course').val(),
                subject: $(this).val()
            };
            $.ajax({
                url: "<?php echo base_url(); ?>index.php/registerprojects/getSemester",
                data: postData,
                type: "POST",
                success: function (data) {

                    $("#semester").html(data);
                    runFirst();
                }


            });
        });
        
        function runFirst()
        {
            if ($('#semester option:first-child').val() === 1)
            {
                var postData = {
                    course: $('#course').val(),
                    subject: $('#subject').val(),
                    semester: $('#semester option:first-child').val()
                };

                displayProjects(postData);
            }
        }

        function displayProjects(postData) {
            team.hide();
           proj.hide();
            $.ajax({
                url: "<?php echo base_url(); ?>index.php/registerprojects/getProjectDetails",
                data: postData,
                type: "POST",
               success: function (data) {
                     team.show();
                        proj.show();
                         $("#projects").append(data);
                    }
                });
            }
       $('#semester').click(function () {
            proj.html("");
            if($('#semester').val() !== '')
            {
            var postData = {
                course: $('#course').val(),
                subject: $('#subject').val(),
                semester: $(this).val()
            };
            displayProjects(postData);
        }
        else
        {
            alert('There are no semester values for the course and subject combination.  Try a different combination');
        }
        });
    });
    </script>
<script type="text/javascript">
    function runme(name) {
        var value = $(name).attr('name');
        //  alert(value);
        var chk = $('input:checkbox[value="' + value + '"]').prop('checked', true);
        if (!chk)
        {
            $('input:checkbox[value="' + value + '"]').prop('checked', true);
        }


    }
</script>

