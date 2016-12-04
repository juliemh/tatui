<!-- Navigation -->
<nav>
    <div class="navContainer">
        <div class="dropdown">
            <button class="dropbtn">Lecturer Menu</button>
            <div class="dropdown-content">
		<a href="pages">Dashboard</a>
                <a href="addproject">Add Project</a> 
                <a href="addskill">Add Skill</a>
                <?php 
				$userID=$this->session->userdata('user');
				$level=$this->session->userdata('user');
				?>		
				<a href="<?php echo 'http://192.241.144.135/TAT/api/users/login/'.$userID."/".$level;?>" 
				<p>Run Algorithm</p>
				</a>
	    <a href="logout">Logout</a>
            </div>
        </div>
    </div>
    <!-- end navigation -->
</nav>
