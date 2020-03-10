<?php

if(isset($_POST['login-submit']))
{
    require "databaseTools.php";
    $loginData = new databaseTools("loginsystem");//implementation of the new oop style..

    require 'dbhandler.php';
    $emailUid = $_POST['userEmail'];
    $password = $_POST['pwd'];

    if(empty($emailUid) || empty($password))
    {
        header("Location: ../../login?error=blankFields&email=".$emailUid);
    }
    else
    {
        $loginData -> loginUser($emailUid,$password);
    }
}
else
{
    header("Location: ../../login");
    exit();
}
?>