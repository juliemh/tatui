<h2>Edit Users</h2>

<?php 
$this->load->model('get_user');
        $this->load->helper(array('form', 'url'));
//
// diplays a table of user details from the database
//

 $userdetails = $this->get_user->get_user($user);
 //
 
 $access_type = $this->get_user->user_level( $user );
 //
 echo "<table border='1'>"; 
 echo $message;
      echo '<tr>';
       echo '<th> User ID </th>';
       echo '<th> First Name </th>';
       echo '<th> Last Name </th>';
       echo '<th> Reset Password </th>';
       echo '<th> Current Role </th>';
       echo '<th> Access Level </th>'; 
       echo '<th> Commit Changes </th>';      
     echo '</tr>';
     echo '<tr>'; 
        echo '<td>'.$userdetails[0]->user_id.'</td>'; 
       
        echo'<td>'.$userdetails[0]->firstname.'</td>';
        
        echo'<td>'.$userdetails[0]->lastname.'</td>';
        //password submission button
        $data = array(
             'user_id' => $userdetails[0]->user_id
        );
        echo form_open('password/change_password','',$data);

        // password button
        if ($userdetails[0]->password === 'password') {
           echo'<td>'.form_submit('mysubmit', 'Issue Password').'</td>';
        }
        else
        {
            echo'<td>'.form_submit('mysubmit', 'Reset Password').'</td>';
        }
        echo form_close();

        echo'<td>'.$access_type.'</td>';
        
        $data = array(
           'user' => $user     
        );
        // form head
        
            //
    echo form_open('edituser/update','',$data); 
         //
 
    $access_options = array(
        'none'      =>   'Set Access',
        'student'    => 'Student',
        'lecturer'   => 'Lecturer',
        'admin'      => 'Admin'
    );
    echo '<td>'.form_dropdown('access', $access_options, $access_type).'</td>';       
       //
       // writes the table line
       //
       echo'<td>'.form_submit('submit', 'Commit!').'</td>';
       echo form_close();
       echo '</tr>';
echo '</table>'; 
?>