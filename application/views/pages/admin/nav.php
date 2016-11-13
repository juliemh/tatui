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

                echo anchor('addproject', 'Add Project', 'title="Add Project"');

                echo anchor('addsubject', 'Add Subject', 'title="Add Subject"');

                echo anchor('addskill', 'Add Skill', 'title="Add Skill"');
                
                echo anchor('addproject', 'Add Project', 'title="Add Project"');
                
                echo anchor('runalgorithm', 'Run Algorithm', 'title="Run Algorithm"');
                
                echo anchor('logout', 'Logout', 'title="Logout"');

                ?>
            </div>

        </div>
    </div>

</nav>
