  <h2>View your details here...</h2>
<?php
foreach ($details as $row)  
{
 ?>

<h6>Your Name is  <?php echo $row['firstname']." ".$row['lastname']; ?>
<h6>Your RMIT email address is <?php echo $this->session->userdata('user'); ?></h6>
<h6>Your Gender is  <?php echo $row['gender']; ?></h6>
<?php
} 
if($course == '')
{
    
?>
    <h6>There are Course enrollment records</h6>
    <?php
}
else
{
foreach($course as $row)
    ?> 
<h6>The Course you are enrolled in is  <?php echo $row['course_id']." ".$row['course_description']; ?></h6>
<?php } ?>


  <h3>Subject details </h3>
<table class="skilltable">
    
    <tr>
        <th>Subject ID</th><th>Subject Name</th><th>Semester</th><th>Mark</th>
    </tr>
    <?php 
    if($subjects == '')
    {
        ?>
    <tr><td colspan="4">There are no records of enrolled subjects</td></tr>
    <?php
    }
 else 
        
 {
    foreach($subjects as $row)
    {
       ?>
    <tr>
        <td><?php echo $row['subject_id'] ?></td>
        <td><?php echo $row['subject_name'] ?></td>
         <td><?php echo $row['semester_id'] ?></td>
          <td><?php echo $row['subject_mark'] ?></td>
    </tr>
  <?php  } 
 }?>
</table>


