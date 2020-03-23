<?php
if(isset($_POST['login-submit']))
{
    require "../../Model/php/databaseTools.php";
    $login = new databaseTools("loginsystem");

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