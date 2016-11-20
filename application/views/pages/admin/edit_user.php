<h2>Edit Users</h2>

<?php 
$this->load->model('get_user');
   
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
       echo '<th> Password </th>';
       echo '<th> Current Role </th>';
       echo '<th> Access Level </th>'; 
       echo '<th> Commit Changes </th>';      
     echo '</tr>';
     echo '<tr>'; 
        echo '<td>'.$userdetails[0]->user_id.'</td>'; 
       
        echo'<td>'.$userdetails[0]->firstname.'</td>';
        
        echo'<td>'.$userdetails[0]->lastname.'</td>';
        
        echo'<td>'.$userdetails[0]->password.'</td>';

        echo'<td>'.$access_type.'</td>';
        
        $data = array(
           'user' => $user     
        );
        // form head
        
            //
        echo form_open('edituser/update','',$data); 
         //
         // student
         //
        $checkit = FALSE;
          $_POST['current_user'] = $user;
        if ( strcmp($access_type, "student") == 0) {
            $checkit = TRUE;
        } 
        $sdata = array(
            'name'    => 'access_level',
            'value'   => 'student',
            'checked' => $checkit
            ); 
       $student = form_radio($sdata);
       //
          // lecturer
          //
         $checkit = FALSE;   
         if (strcmp($access_type, "lecturer") == 0) {
            $checkit = TRUE;
        }  
         $ldata = array(
            'name'    => 'access_level',
            'value'   => 'lecturer',
            'checked' => $checkit
            );
            // admin
        $checkit = FALSE;
        if (strcmp($access_type, "admin") == 0) {
            $checkit = TRUE;
        } 
        $lecturer = form_radio($ldata);
        //
        // admin
        //
        $adata = array(
            'name'    => 'access_level',
            'value'   => 'admin',
            'checked' => $checkit
            );
        $admin = form_radio($adata);
        //
        // none
        //
        $checkit = FALSE;
        if (strcmp($access_type, "none") == 0) {
            $checkit = TRUE;
        }     
        // none
        $ndata = array(
            'name'    => 'access_level',
            'value'   => 'none',
            'checked' => $checkit
            );
            
        $none = form_radio($ndata); 
       
       //
       // writes the table line
       //
       echo '<td>'.$student." Student".$lecturer." Lecturer".$admin." Admin".$none." None".'</td>';
       echo'<td>'.form_submit('mysubmit', 'Commit!').'</td>';
       echo '</tr>';
echo '</table>'; 
?>