<!DOCTYPE html>
<html lang="en">
<head>
    <script src="model/js/jquery/jquery-3.4.1.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Orginizer</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="view/css/reset.css">
    <link rel="stylesheet" href="view/css/header.css">
</head>
<header>
    <?php
        session_start();
        include 'model/includes/autoload.inc.php';
        if (!isset($_SESSION['userId']))
        {
            include 'view/header/headerloggedout.php';
        }
        else
        {
            include 'view/header/headerloggedin.php';
        }
    ?>
</header>
<body>
<?php
if(isset($_SESSION['userId']))
{
    include 'view/search/html/search.html';
}
?>
</body>
<footer>
    <script src="model/js/imdbapi.js"></script>
    <script src="controller/mediasearch.js"></script>
</footer>
</html>

