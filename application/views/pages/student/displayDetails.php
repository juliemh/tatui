  <h2>View your details here...</h2>
<?php

foreach ($details as $row)  
{
 ?>

  <h5>Your Details</h5>
  <table width="90%">
      <tr><th>Name</th><th>Logon ID/Email address</th><th>Gender</th></tr>
      <tr>
          <td><?php echo $row->firstname." ".$row->lastname; ?></td>
  <td> <?php echo $this->session->userdata('user'); ?></td>
<td> <?php echo $row->gender; ?></td>
      </tr>
  </table>
  <h5>Course Details</h5>
<?php
} 
if(empty($course))
{
    
?>
    <h6>There are no Course enrollment records</h6>
    <?php
}
else
{?>
  
    <table width="90%">
        <tr><th>Course ID</th><th>Course Name</th><th>Course Description</th></tr>
        <?php
foreach($course as $row)
    ?> 
        <tr>
            <td><?php echo $row->course_id ?></td>
            <td><?php echo $row->course_name ?></td>
            <td><?php echo $row->course_description ?></td>
                
        </tr>

<?php } ?>
    </table>

  <h5>Subject details </h5>

    <?php 
    if(empty($subjects))
    {
        ?>
  <h5>There are no records of enrolled subjects</h5>
    <?php
    }
 else 
        
 {?>
    </table>
     <table  width="90%">
    
    <tr>
        <th>Subject ID</th><th>Subject Name</th><th>Subject Details</th><th>Semester</th><th>Mark</th>
    </tr>
    <?php
    foreach($subjects as $row)
    {
       ?>
    <tr>
        <td><?php echo $row->subject_id ?></td>
        <td><?php echo $row->subject_name ?></td>
        <td><?php echo $row->subject_description ?></td>
         <td><?php echo $row->semester_id ?></td>
          <td><?php echo $row->subject_mark ?></td>
    </tr>
  <?php  } 
 }?>
</table>
      <h5>Skill details </h5>

    <?php 
    if(empty($skills))
    {
        ?>
      <h6>There are no skills recorded</h6>>
    <?php
    }
 else 
        
 {?>
     <table width="90%">
    
    <tr>
        <th>Skill ID</th><th>Level Selected</th><th></th>
    </tr>
    <?php
    foreach($skills as $row)
    {
       ?>
    <tr>
        <td><?php echo $row->skill_id ?></td>
        <td><?php echo $row->skilllevel ?></td>
    </tr>
  <?php  } 
 }?>
</table>


