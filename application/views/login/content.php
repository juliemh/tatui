 <div id="page-wrapper">


<?php $msg = $this->session->flashdata('msg'); if((isset($msg)) && (!empty($msg))) { ?>
<div class="alert alert-success">
 <button class="close" data-dismiss="alert">x</button>
 <?php print_r($msg); ?>
</div>
<?php } ?>

     <div class="formContainer">
     <h2>Please log on...</h2>
<form method="post" action="<?php echo base_url();?>login/validate" method="post" id="login">
    <div class="login-container">
   
      <div class='login-username-container'>
        <label>Username</label>
        <input autofocus placeholder='Username' type='text' name="username" required>
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
                </div>
 </div>