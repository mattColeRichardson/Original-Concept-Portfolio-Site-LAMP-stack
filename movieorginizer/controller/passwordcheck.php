<?php
include "../model/includes/autoloadcont.inc.php";
session_start();

if(isset($_POST['pwd']))
{
    $userid = $_SESSION['userId'];
    $password = $_POST['pwd'];
    $login = new Login;
    $result = $login->checkUserPassword($password,$userid);
}
if ($result)
{

}
else
{
echo "not working";
}
?>