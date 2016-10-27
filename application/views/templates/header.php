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
        <link type="text/css" href="<?php echo base_url() ?>assets/css/tatui.css" rel="stylesheet">

        <link type="text/css" href="<?php echo base_url() ?>assets/css/bootstrap.css" rel="stylesheet">
        <!-- Custom Fonts -->
        <link href="<?php echo base_url() ?>assets/css/font-awesome.min.css"
              rel="stylesheet" type="text/css">

        <script src="<?php echo base_url() ?>assets/js/jquery-2.1.3.min.js"></script>

        <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>


        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
                    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
                    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
                <![endif]-->

    </head>

    <body>

        <header>
            <div class="container"> 
                <img class="rlogo" src="<?php echo base_url() ?>assets/img/rmitlogo.png" alt="RMIT logo" />


                <img class="tlogo" src="<?php echo base_url() ?>assets/img/tatlogo.png" alt="TAT logo" />
            </div>
            <?php $this->load->helper(array('form', 'url'));
            if ($this->session->userdata('user') == TRUE) {
                ?>
                <h2 class="welcome">Welcome <?php echo $this->session->userdata('user'); ?></h2>
                <?php
            } else {
                ?>
                <h2 class="welcome">Welcome to The Team Allocation Tool</h2>
                <?php
            }
            ?>

            
        </header>
        <section class="main-content">






