<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow"> 
    <link rel="stylesheet" href="View/css/Header.css">
    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
    <i class="fa fa-bars"></i>
    </button>
    
    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <?php
        if(isset($_SESSION['userId']))
        {
            //added to header after the login.
            include 'View/php/alerts.php';
            include 'View/php/messages.php';
            include 'View/php/loggedin.php';
        }
        else{
            //added to header before the login.
            include 'View/php/Loggedout.php';
        }
        ?>
    </ul>
    
</nav>