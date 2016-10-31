<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">

 <title><?php echo $page_title; ?></title>

<!-- Core CSS -->
<link type="text/css" href="<?php echo base_url() ?>assets/css/bootstrap.css" rel="stylesheet">
<link type="text/css" href="<?php echo base_url() ?>assets/css/tatui.css" rel="stylesheet">


<!-- Custom Fonts -->
<link href="<?php echo base_url() ?>assets/css/font-awesome.min.css"
	rel="stylesheet" type="text/css">

<script src="<?php echo base_url() ?>assets/js/jquery-3.1.1.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>
<body>
        <header>
          <img class="rmitlogo" src="<?php echo base_url() ?>assets/img/rmitlogo.png" alt="RMIT logo" />     
          <img class="tatalogo" src="<?php echo base_url() ?>assets/img/tatlogo.png" alt="TAT logo" />
          <div class="logout-button">
           <?php 
           $this->load->helper(array('form','url'));
            if ($this->session->userdata('user') == TRUE ) {
                     echo '<h3>Welcome '.$this->session->userdata('firstname').anchor('logout', '  Logout', 'title="Logout"').'</h3>';
                }
                else {
                     echo '<h3>Welcome</h3>';
               }
            ?>
            </div>
           </header>
          <section class="main-content">
          




