<?php
if(isset($_POST['signup-submit']))
{
    // require 'dbhandler.php'; old functional style.
    require "databaseTools.php";
    $login = new databaseTools("loginsystem");

    $username = $_POST['email'];
    $pwd = $_POST['Pwd'];
    $RepeatPwd = $_POST['RepeatPwd'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];

    if ($pwd !== $RepeatPwd)
    {
        header("Location: ../../register?error=pwdMismatch&email=".$username."&fName=".$firstName."&lName=".$lastName);
        exit();
    }
    else
    {
            if($login -> checkExistingEmail($username))
            {
                header("Location: ../../register?error=userTaken&fName=".$firstName."&lName=".$lastName);
                exit();
            }
            else
            {
               if(!$login -> createNewUser($username, $firstName, $lastName, $pwd))
               {
                header("Location: ../../register?DatabaseError");
               }
               else
               {
                header("Location: ../../register?RegistrationSuccessfull");
               }
               
            }
    }
    
    mysqli_close($conn);
}
else
{
    header("Location: ../../register.html");
}
?>