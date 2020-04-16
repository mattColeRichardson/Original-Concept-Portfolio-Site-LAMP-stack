<?php 
include "../model/includes/autoloadcont.inc.php";

if(isset($_POST['username']))
{
    $login = new Login;
    $username = $_POST['username'];
    $password = $_POST['password'];
    $login->loginUser($username, $password);
}
?>