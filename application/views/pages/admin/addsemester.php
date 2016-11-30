<h2>Add a semester here...</h2>    
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
<form id="addsemester" method="post" action="./addsemester/validate">
    <table>  
        <tr>
            <td align="right"><b> Semester ID</b></td>
            <td align="left"><input type="text" name="semester" required /></td>
        </tr>
        <tr>
            <td align="right"><b> Semester Start Date</b></td>
            <td align="left">    <div class="input-group date">
                    <input type="text" class="form-control" name="startdate"  required />
                    <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                </div></td>

            <td align="right"><b> Semester Finish Date</b></td>
            <td align="left"> <div class="input-group date">
                    <input type="text" class="form-control" name="finishdate" required />
                    <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                </div></td>
        </tr> 
    </table>

<div class='login-username-container'>
    <a href="pages" class="btn logoutbtn">Back to Dashboard</a>
    <input type="submit" value="Add" name="submit" class="btn logoutbtn"  />
<?php echo form_reset('reset', 'Reset', array('class' => 'btn logoutbtn')); ?>
  <!--  <input type="reset" value="Reset" name="reset" class="btn logoutbtn"/>   -->                
</div>
</form>

<script type="text/javascript">

    $('.input-group.date').datepicker({
        format: "yyyy-mm-dd"
    });

</script>

