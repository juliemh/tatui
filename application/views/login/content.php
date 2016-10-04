 <div id="page-wrapper">



     <div class="formContainer">
     <h2>Please log on...</h2>
<form method="post" action="./login/validate" method="post" id="login">
    <div class="login-container">
   
      <div class='login-username-container'>
        <label>Email</label>
        <input autofocus placeholder='Username' type='text' name="email" required>
      </div>
    <div class='login-username-container'>
        <label>Password</label>
        <input placeholder='Password' type='password' name="password" required>
    </div>
        <div class='login-username-container'>
        <button>Login</button>
        <button class="js-toggle-login" type="button">Cancel</button>

      </div>
    </div>
</form>
    
     <div class="message-container">
    <?php $msg = $this->session->flashdata('msg1');
if ((isset($msg)) && (!empty($msg))) { ?>
    <div class="alert alert-danger">
        <button class="close" data-dismiss="alert">x</button>
    <?php print_r($msg); ?>
    </div>
<?php } ?>



<?php $msg = $this->session->flashdata('msg');
if ((isset($msg)) && (!empty($msg))) { ?>
    <div class="alert alert-success">
        <button class="close" data-dismiss="alert">x</button>
    <?php print_r($msg); ?>
    </div>
<?php } ?>
     </div>
     
        <div class="message-container">
    <?php $msg = $this->session->flashdata('msg1');
if ((isset($msg)) && (!empty($msg))) { ?>
    <div class="alert alert-danger">
        <button class="close" data-dismiss="alert">x</button>
    <?php print_r($msg); ?>
    </div>
<?php } ?>



<?php $msg = $this->session->flashdata('msg');
if ((isset($msg)) && (!empty($msg))) { ?>
    <div class="alert alert-success">
        <button class="close" data-dismiss="alert">x</button>
    <?php print_r($msg); ?>
    </div>
<?php } ?>
            
     </div>       
     </div>         
 </div>