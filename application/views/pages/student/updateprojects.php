<h2>Update your projects here...</h2>
<div class="message-container">
  
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
<div class="formcontainer" method="post" action="./updateprojects">

    <!--  <form id="registerpref" method="post" action="./registerprojects/validate">-->
    <form>
        <table>

            <tr>
                <td align="right"><b>Course </b></td>
                <td>
                    <?php echo $this->session->flashdata('course') ?>


                    </select>

                <td align="right"><b>  Subject </b></td>
                <td>
                  
<?php echo $this->session->flashdata('subject') ?>
                </td>

                <td align="right"><b> Semester </b></td>
                <td>

                <?php echo $this->session->flashdata('semester') ?>
                </td>    
            </tr>
        </table>
        <div id="projects">
            <table>
                <table width="90%" id="projtable">'
                           
                              <tr><th></th><th>Project ID</th><th>Project Name</th>
                              <th>Project Description</th><th>Skills Required</th><th>Preference</th></tr>
                
              <?php
          
        $project = $this->session->flashdata('proj');
  
           foreach($project as $row => $value)
           {
                echo $value;
          // }
          //
           }
              ?>
  
            </table>
          
        </div>
        <div id="teammate">
            <h4>These are people you nominated to work with. </h4>
            <div class="login-container">

                <div class="login-username-container">
                    <?php
                  
        $mates = $this->session->flashdata('mates');
foreach($mates as $m => $value)
{?>
    <label for="pref1">Team mate </label>      
                    <input id="pref1" value="<?php echo $value ?>" />
                    <?php
}?>              

                </div>
            </div>
        </div>
        <div class='login-username-container'>
            <a href="pages" class="btn logoutbtn">Back to Dashboard</a>
         <!--   <input  value="Register" name="submit" onclick="getParams();" class="btn logoutbtn"  />      -->
            <button id="update" class="btn logoutbtn">Update</button>
        </div>
    </form>

</div>  

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