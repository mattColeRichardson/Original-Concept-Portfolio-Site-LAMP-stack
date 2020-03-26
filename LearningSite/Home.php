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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Orginizer</title>
    <link rel="stylesheet" href="View/Css/header.css">
</head>
<body>
    
</body>
</html>

