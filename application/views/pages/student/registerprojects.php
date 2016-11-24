
<h2>Register for projects here...</h2>
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
            foreach ($addedMsg as $row => $value) { {
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
<!--<div class="formcontainer" method="post"> -->

<form id="registerpref" method="post" action="./registerprojects/validate">
    <form>
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

        </div>
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
        <div class='login-username-container'>
            <a href="pages" class="btn logoutbtn">Back to Dashboard</a>
          <input type="submit" value="Register" name="submit"  class="btn logoutbtn"  />      
<!--            <button onclick="getParams();" class="btn logoutbtn">Register</button>  -->
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


            //  var postData = {
            //      course: $('#course').val(),
            //      subject: $('#subject').val(),
            //      semester: $(this).val()
            //  };
            /*dropdown post */
            $.ajax({
                url: "<?php echo base_url(); ?>index.php/registerprojects/getProjectDetails",
                data: postData,
                type: "POST",
                success: function (result) {
                    var obj = $.parseJSON(result);
                    console.log(obj);
                    if (obj == 0) {
                        var opt = '<h3> Sorry there are no projects defined yet.  Please try later.</h3>'
                                + '<table width="90%" id="projtable">'
                                + '</table>';
                        proj.append(opt);
                        proj.show();
                    } else {
                        var opt = '<table width="90%" id="projtable">'
                                + '<tbody>'
                                + '<tr><th></th><th>Project ID</th><th>Project Name</th>'
                                + '<th>Project Description</th><th>Skills Required</th><th>Preference</th></tr>';
                        $('#projects').append(opt);
                        $.each(obj, function (index, object)
                        {
                            var opt = $('<tr><td><input type="checkbox" value="' + object['project_id'] + '"/></td>'
                                    + ' <td>' + object['project_id'] + ' </td>'
                                    + ' <td>' + object['project_desc'] + ' </td><td>' + object['skills'] + ' </td>'
                                    + ' <td> <select name="' + object['project_id'] + '" onchange="runme(this);">'
                                    + '<option value="" >Select</option>'
                                    + '<option value="1">1</option>'
                                    + '<option value="2" >2</option>'
                                    + '<option value="3">3</option>'
                                    + '<option value="4">4</option>'
                                    + '<option value="5">5</option>'
                                    + '<option value="6">6</option>'
                                    + '<option value="7">7</option>'
                                    + '<option value="8">8</option>'
                                    + '<option value="9">9</option>'
                                    + '<option value="10">10</option>'
                                    + '</select> </td></tr>');
                            proj.append(opt);
                        });
                        opt = '</tbody></table>';
                        proj.append(opt);
                        team.show();
                        proj.show();
                    }

                }
            });
        }

        $('#semester').click(function () {

            proj.html("");
            var postData = {
                course: $('#course').val(),
                subject: $('#subject').val(),
                semester: $(this).val()
            };
            displayProjects(postData);
            // $("#projects").html(data);


        });
    });</script>
<script type="text/javascript">
    function runme(name) {

        // alert('whoo hoo');
        var value = $(name).attr('name');
        //  alert(value);
        var chk = $('input:checkbox[value="' + value + '"]').prop('checked', true);
        if (!chk)
        {
            $('input:checkbox[value="' + value + '"]').prop('checked', true);
        }


    }
</script>
<script type="text/javascript">
    function getParams() {

        //  $("#select option").each(function(){
        //       alert($(this).text() + " : " + $(this).val());
        //    });
//$('#projects select').each(function() {
//    alert($(this).attr('name') + ' : ' + $('select[name="' + $(this).attr('name') + '"] option:selected').val());
//});
        // var arr = new Array;

        // $("#selectboxid option").each  ( function() {
        //  arr.push ( $(this).val() );
        //});


        var proj = new Array();
        $('#projects select').each(function ( ) {

            proj.push($(this).attr('name') + ' : ' + $('select[name="' + $(this).attr('name') + '"] option:selected').val());
        });

        var mates = new Array();

        mates.push('pref1 : ' + $('#pref1').val());
        mates.push('pref2 : ' + $('#pref2').val());
        mates.push('pref3 : ' + $('#pref3').val());
//console.log("proj = %o, mates = %o", proj, mates);
       
        $.ajax({
            url: "<?php echo base_url(); ?>index.php/registerprojects/validate",
            data: {
            proj: proj,
   
            mates: mates
        },
            
            type: "POST",
            success: function (data) {

                alert(data);

            }
        });

    }

</script>

