<link rel="stylesheet" href="View/Css/header.css">
<?php
session_start();
include 'Model/Includes/autoLoad.inc.php';
if (!isset($_SESSION['userId']))
{
    include 'View/Header/headerLoggedOut.php';
}
else
{
    include 'View/Header/headerLoggedIn.php';
}
?>
<head>
    <script src="Model/JS/Jquery/jquery-3.4.1.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>