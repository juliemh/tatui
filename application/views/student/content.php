<div class="page-wrapper">


<?php $msg = $this->session->flashdata('msg1'); if((isset($msg)) && (!empty($msg))) { ?>
<div class="alert alert-danger">
 <button class="close" data-dismiss="alert">x</button>
 <?php print_r($msg); ?>
</div>
<?php } ?>


<form method="post" action="<?php echo base_url();?>login/validate" method="post" id="login">
  <div class='preload login--container'>
    <div class='login--form'>

      <div class='login--username-container'>
        <label>Username</label>
        <input autofocus placeholder='Username' type='text' name="username" required>
      </div>
      <div class='login--password-container'>
        <label>Password</label>
        <input placeholder='Password' type='password' name="password" required>
        <button class='login--login-submit'>Login</button>
        <button class="js-toggle-login" type="button">Cancel</button>

      </div>
    </div>
    <div class='login--toggle-container'>

      <small>Hey you,</small>
      <div class='js-toggle-login'>Click Me!</div>   
    </div>
  </div>
</form>
                </div>