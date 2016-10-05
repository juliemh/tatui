<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">

<title>Team Allocation Tool|Student |</title>

<!-- Core CSS -->
<link type="text/css" href="../assets/css/tatui.css" rel="stylesheet">

<link type="text/css" href="../assets/css/bootstrap.css" rel="stylesheet">
<!-- Custom Fonts -->
<link href="../assets/css/font-awesome.min.css"
	rel="stylesheet" type="text/css">

<script src="../assets/js/jquery-2.1.3.min.js"></script>

<script src="../assets/js/bootstrap.min.js"></script>


<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

</head>

<body>

	
<div id="wrapper">
           <header>
            <div class="container"> 
                <img class="rlogo" src="../assets/img/rmitlogo.png" alt="RMIT logo" />
                         
        
                <img class="tlogo" src="../assets/img/tatlogo.png" alt="TAT logo" />
            </div>
  
            <h2 class="welcome">Welcome <?php echo $this->session->userdata('lecturer_first');?></h2>
           </header>
     <div class="logout">
                <a href="<?php echo base_url('login/lecturer_logout')?>" class="btn logoutbtn">Click me to Logout</a>
		
		
            </div>
		<!-- Navigation -->
                <nav>
                    <div class="navContainer">
                    <div class="dropdown">
			<button class="dropbtn">Lecturer Menu</button>
			<div class="dropdown-content">
				<a href="#">Add Project</a> 
                                <a href="#">Add Skill</a>
                                <a href="#">Run Algorithm</a>
			</div>
                    </div>
	</div>
	<!-- end navigation -->
	</nav>