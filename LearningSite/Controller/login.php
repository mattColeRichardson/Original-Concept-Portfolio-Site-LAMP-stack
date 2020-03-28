<?php 
include "../Model/Includes/autoLoadCont.inc.php";

if(isset($_POST['username']))
{
    $login = new Login;
    $username = $_POST['username'];
    $password = $_POST['password'];
    $login->loginUser($username, $password);
}
?>