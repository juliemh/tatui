  <h2>Manage your skills here...</h2>
  
  <p>All available skills will display here.  Your selected skills will display with a filled in checkbox.</p>
  <p>To update your skills simply make a selection and click Update.  Your screen will refresh with the updated skills.</p>
  <p>To remove a skill click the delete option and click update.</p>
<div class="formcontainer">
   
    <form id="skillselect" method="post" action="./manageskills/validate">
        <table>
            <tr>
                <th></th> <th>Skill Name</th><th>Beginner</th><th>Medium Level</th><th>Expert</th><th>Delete Skill</th>
            </tr>
            <?php foreach ($skills as $row) {
                ?>

                <tr>
                    <td><input type="checkbox" name="skillcheck[]" <?php if (($row['skilllevel'] == 'beginner') || ($row['skilllevel'] == 'medium') || ($row['skilllevel'] == 'expert')) { ?> checked=checked <?php } ?>id="<?php echo $row['skill_id']; ?>" value="<?php echo $row['skill_id']; ?>" /></td>
                    <td><label for="<?php echo $row['skill_id']; ?>"><?php echo $row['skill_id']; ?></label></td>
                    <td><input type="radio" name="<?php echo $row['skill_id']; ?>" value="beginner" <?php if ($row['skilllevel'] == 'beginner') { ?> checked=checked <?php } ?> id="<?php echo $row['skill_id']; ?>"  /></td>
                    <td><input type="radio" name="<?php echo $row['skill_id']; ?>" value="medium" <?php if ($row['skilllevel'] == 'medium') { ?> checked=checked <?php } ?>  id="<?php echo $row['skill_id']; ?>"   /></td>
                    <td><input type="radio" name="<?php echo $row['skill_id']; ?>" value="expert" <?php if ($row['skilllevel'] == 'expert') { ?> checked=checked <?php } ?> id="<?php echo $row['skill_id']; ?>"   /></td>
                    <td><input type="radio" name="<?php echo $row['skill_id']; ?>" id="<?php echo $row['skill_id']; ?>" value="delete"  /></td>
                </tr>
            <?php }
            ?>
        </table>

        <div class='login-username-container'>
            <a href="pages" class="btn logoutbtn">Back to Dashboard</a>
            <input type="submit" value="Update" name="submit" class="btn logoutbtn"  />        
        </div>
    </form>

</div>  


<script type="text/javascript">

    $('input:radio').click(function () {
        value = $(this).attr('name');

        var chk = $('input:checkbox[value="' + value + '"]').prop('checked', true);
        if (!chk)
        {
            $('input:checkbox[value="' + value + '"]').prop('checked', true);
        }

    });

</script>