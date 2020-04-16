<link rel="stylesheet" href="view/css/reset.css">
<link rel="stylesheet" href="view/css/header.css">
<?php
session_start();
include 'model/includes/autoLoad.inc.php';
if (!isset($_SESSION['userId']))
{
    include 'view/header/headerloggedout.php';
}
else
{
    include 'view/header/headerloggedin.php';
}
?>
<head>
    <script src="model/js/jquery/jquery-3.4.1.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<body>
    <?php
    include 'view/logincheck/html/passwordcheck.html';
    ?>
</body>