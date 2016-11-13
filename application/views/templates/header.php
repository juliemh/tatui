<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">

 <title><?php echo $page_title; ?></title>

        <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Droid+Serif" />
        <link type="text/css" href="<?php echo base_url() ?>assets/css/bootstrap.css" rel="stylesheet">
        <link type="text/css" href="<?php echo base_url() ?>assets/css/bootstrap-datepicker3.min.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link type="text/css" href="<?php echo base_url() ?>assets/css/tatui.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <script src="<?php echo base_url() ?>assets/js/jquery-2.1.3.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/bootstrap-datepicker.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/locales/bootstrap-datepicker.en-AU.min.js"></script>
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
                echo '<h1>Welcome: '.$this->session->userdata('firstname').anchor('logout', 'Logout', 'title="Logout" class="btn logoutbtn"').'</h1>';
                }
                else {
                     echo '<h1>Welcome</h1>';
               }
            ?>
            </div>
           </header>
           <section class="main-content">
          




