<div class="logout">
    <a href='logout' class="btn logoutbtn">Click me to Logout</a>
</div>
<!-- Navigation -->
<nav>
    <div class="navContainer">
        <div class="dropdown">
            <button class="dropbtn">Lecturer Menu</button>
            <div class="dropdown-content">
                <a href="#">Add Project</a> 
                <a href="#">Add Skill</a>
                <?php 
				$userID=$this->session->userdata('user');
				$level=$this->session->userdata('user');
				?>		
				<a href="<?php echo 'http://192.241.144.135/TAT/api/users/login/'.$userID."/".$level;?>" 
				<p>Run Algorithm</p>
				</a>
            </div>
        </div>
    </div>
    <!-- end navigation -->
</nav>
