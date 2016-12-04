<div id="page-wrapper">
<h1>What would you like to do?</h1>
<div class="d-box">
    <div class="head purple">
    <span>
    <i class="fa fa-plus fa-5x"></i>
    <h3>Add Projects</h3>
    </span>
    </div>
        <div class="bottom">
            <span>
            <a href="addproject">
            <p>View details</p>
            <i class="fa fa-arrow-circle-right"></i>
            </a>
            </span>
        </div>
    </div>

    <div class="d-box">
    <div class="head blue">
    <span>
    <i class="fa fa-plus-square-o fa-5x"></i>
    <h3>Add Skill</h3>
    </span>
    </div>
        <div class="bottom">
            <span>
            <a href="addskill">
            <p>View details</p>
            <i class="fa fa-arrow-circle-right"></i>
            </a>
            </span>
        </div>
    </div>
   
   
    <div class="d-box">
        <div class="head orange">
    <span>
    <i class="fa fa-play fa-5x"></i>
    <h3>Run Algorithm</h3>
    </span>
    </div>
        <div class="bottom">
            <span>
            <?php 
            $userID=$this->session->userdata('user');
            $level=$this->session->userdata('user');
            ?>
            <a href="<?php echo 'http://192.241.144.135/TAT/api/users/login/'.$userID."/".$level;?>"
            <p>View details</p>
            <i class="fa fa-arrow-circle-right"></i>
            </a>
            </span>
        </div>
    </div>
