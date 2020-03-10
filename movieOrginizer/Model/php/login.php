<?php
// new OOP style login system emplemented, need to address the creation of new users next.
if(isset($_POST['login-submit']))
{
    require "databaseTools.php";
    $login = new databaseTools("loginsystem");

    require 'dbhandler.php';
    $emailUid = $_POST['userEmail'];
    $password = $_POST['pwd'];

    if(empty($emailUid) || empty($password))
    {
        header("Location: ../../login?error=blankFields&email=".$emailUid);
    }
    else
    {
        $login -> loginUser($emailUid,$password);
    }
}
else
{
    header("Location: ../../login");
    exit();
}
?>