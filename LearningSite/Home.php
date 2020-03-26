<?php
session_start();
include 'Model/Includes/autoLoad.inc.php';
if (!isset($_SESSION['userId']))
{
    include 'view/loginForm.html';
}
else
{
    include 'view/profile.html';
}
?>
