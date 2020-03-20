<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
      
        <title>Movie Orginizer</title>

        <!-- Core plugin JavaScript-->
        <script src="View/vendor/jquery/jquery.min.js"></script>
        <script src="View/vendor/jquery-easing/jquery.easing.min.js"></script>
        
      
        <!-- Custom fonts for this template-->
        <link href="View/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
      
        <!-- Custom styles for this template-->
        <link href="View/css/sb-admin-2.min.css" rel="stylesheet">

        <!-- myStylesheets-->
        <link href="View/css/Movieresults.css" rel="stylesheet">
      
  </head>

  <body id="page-top">
    <div id = "wrapper">
            <!--SideBar-->
            <?php include "View/php/Sidebar.php";?>
            <!--SideBar End-->

            <!-- Content wrapper-->
            <div id="content-wrapper" class="d-flex flex-column">
                <!--MAIN Content-->
                <div id="content">
                    
                    <!-- Topbar -->
                    <?php include "View/php/SearchHeader.php";?>
                    <!-- Topbar !END -->

                    <!-- Main fluid container -->
                    <div class="container-fluid text-center" id = "media-search-results"></div>
                    <!-- Main fluid container -->
                </div>
            </div>
    </div>
<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login">Logout</a>
        </div>
      </div>
    </div>
  </div>

<!-- Core components-->
  <div>
    <!-- Model-->
    <script src="Model/JS/imdbAPI.js"></script>
    <!-- View-->
    <!-- Bootstrap core JavaScript-->
    
    <script src="View/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    

    <!-- Custom scripts for all pages-->
    <script src="View/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="View/vendor/chart.js/Chart.min.js"></script>

  </div>
  
  </body>
</html>