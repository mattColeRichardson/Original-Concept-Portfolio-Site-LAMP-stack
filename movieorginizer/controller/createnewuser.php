<?php
include "../model/includes/autoloadcont.inc.php";
if(isset($_POST['password2']))
{
    $login = new Login();

    $username = $_POST['email'];
    $pwd = $_POST['password'];
    $RepeatPwd = $_POST['password2'];
    $firstName = $_POST['firstname'];
    $lastName = $_POST['lastname'];

    if ($pwd !== $RepeatPwd)
    {
        header("Location: ../view/header/html/createnewuserform?error=pwdMismatch&email=".$username."&fName=".$firstName."&lName=".$lastName);
        exit();
    }
    else
    {
            if($login -> checkExistingEmail($username))
            {
                header("Location: ../view/header/html/createnewuserform?error=usertaken&fname=".$firstName."&lname=".$lastName);
                exit();
            }
            else
            {
               if(!$login -> createNewUser($username, $firstName, $lastName, $pwd))
               {
                header("Location: ../view/header/html/createnewuserform?databaseerror");
               }
               else
               {
                header("Location: ../home");
                $login->loginUser($username, $pwd);
                exit();
               }
               
            }
    }
    
    mysqli_close($conn);
}
else
{
    header("Location: ../view/header/html/createnewuserform.html");
}
?>