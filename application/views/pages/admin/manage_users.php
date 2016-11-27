<h2>Manager Users</h2>

<?php 
$this->load->model('get_user');
$this->load->helper('form');

echo $message;
 //
 // input a new user
 //
echo "<h3>Add New User</h3>";
echo validation_errors();
echo "<table border='1'>"; 
echo '<tr>';
       echo '<th> User ID </th>';
       echo '<th> First Name </th>';
       echo '<th> Last Name </th>';
        echo '<th> Gender </th>';
       echo '<th> Access Level </th>'; 
       echo '<th> Add </th>';      
echo '</tr>';
//
// form to add single user
//
echo '<tr>';  
  //
    echo form_open('manageusers/add_user'); 
    //
    // User ID
    $edata = array(
        'name'          => 'email',
        'id'            => 'email',
        'value'         => set_value('email')
    );
    echo '<td>'.form_input($edata).'</td>';
    //  First Name ;
     $fndata = array(
        'name'          => 'firstname',
        'id'            => 'firstname',
        'value'         => set_value('firstname')
    );
    echo '<td>'.form_input($fndata).'</td>';
    //  Last Name
     $lndata = array(
        'name'          => 'lastname',
        'id'            => 'lastname',
        'value'         => set_value('lastname')
    );
    echo '<td>'.form_input($lndata).'</td>';
   //  Gender 
   
   $gender_options = array(
        'gender'  => 'Gender',
        'm'       => 'Male',
        'f'       => 'Female',
    );
    echo '<td>'.form_dropdown('gender', $gender_options, set_value('gender')).'</td>';
   //   Access Level
   $access_options = array(
        'access'     => 'Access Type',
        'student'    => 'Student',
        'lecturer'   => 'Lecturer',
        'admin'      => 'Admin'
    );
    echo '<td>'.form_dropdown('access', $access_options, set_value('access')).'</td>';
       //
       // submit
       //
    echo'<td>'.form_submit('submit', 'Add!').'</td>';
    echo form_close(); 
echo '</tr>';
echo '</table>'; 
//
// diplays a table of user details from the database
//
echo "<h3>Edit User</h3>";
echo "<table border='1'>"; 
foreach($users as $line) {
     $access_type = $this->get_user->user_level( $line->user_id );
     
     $data = array(
         'userid' => $line->user_id
     );
   
     echo "<tr>";      
        echo form_open('edituser','',$data);         
        echo '<td>'.$line->user_id.'</td>'; 
        echo'<td>'.$line->firstname.'</td>';        
        echo'<td>'.$line->lastname.'</td>';
        echo'<td>'.$access_type.'</td>';        
        echo '<td>'.form_submit('submit','Edit').'</td>';       
        echo form_close();             
    echo "</tr>";
    }
echo "</table>"; 
