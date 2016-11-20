<h2>Manager Users</h2>

<?php 
$this->load->model('get_user');

//
// diplays a table of user details from the database
//

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

        echo'<td>'.$access_type.'</td>';
        
        echo '<td>'.form_submit('submit','Edit User').'</td>';
        
        echo form_close();
             
    echo "</tr>";
    }
echo "</table>"; 
