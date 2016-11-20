<!-- Navigation -->
<nav>
    <div class="navContainer">
        <div class="dropdown">
            <button class="dropbtn">Admin Menu</button>
            <div class="dropdown-content">
                <?php
                defined('BASEPATH') OR exit('No direct script access allowed');
                
                 echo anchor('pages', 'Dashboard', 'title="Dashboard"');
                
                echo anchor('manageusers', 'Manage Users', 'title="Manage Users"');

                echo anchor('upload', 'Upload File', 'title="Import Data"');
                
                echo anchor('import', 'Import Data', 'title="Import Data"');
                
                 echo anchor('addcourse', 'Add Course', 'title="Add Course"');
                
                echo anchor('addsubject', 'Add Subject', 'title="Add Subject"');

                echo anchor('addproject', 'Add Project', 'title="Add Project"');

                echo anchor('addskill', 'Add Skill', 'title="Add Skill"');
                
                $userID=$this->session->userdata('user');
				$level=$this->session->userdata('user');
				echo anchor('http://192.241.144.135/TAT/api/users/login/'.$userID."/".$level, 'Run Algorithm', 'title="Run Algorithm"');
                ?>
            </div>

        </div>
    </div>

</nav>
