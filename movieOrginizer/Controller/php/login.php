<?php
if(isset($_POST['login-submit']))
{
    require_once "../../Model/php/loginTools.php";
    $login = new loginTools();

    $emailUid = $_POST['userEmail'];
    $password = $_POST['pwd'];

    if(empty($emailUid) || empty($password))
    {
        header("Location: ../../login?error=blankFields&email=".$emailUid);
    }
    else
    {
        $login->loginUser($emailUid,$password);
    }
}
else
{
    header("Location: ../../login");
    exit();
}
?>