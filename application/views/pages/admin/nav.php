<div class="logout">
    <a href='logout' class="btn logoutbtn">Click me to Logout</a>
</div>

<!-- Navigation -->
<nav>
    <div class="navContainer">
        <div class="dropdown">
            <button class="dropbtn">Admin Menu</button>
            <div class="dropdown-content">
                <?php
                defined('BASEPATH') OR exit('No direct script access allowed');

                echo anchor('addproject', 'Add Project', 'title="Add Project"');

                echo anchor('addsubject', 'Add Subject', 'title="Add Subject"');

                echo anchor('importusers', 'Import Users', 'title="Import Users"');

                echo anchor('addskill', 'Add Skill', 'title="Add Skill"');

                echo anchor('pages', 'Dashboard', 'title="Dashboard"');

                echo anchor('logout', 'Logout', 'title="Logout"');
                ?>
            </div>

        </div>
    </div>

</nav>