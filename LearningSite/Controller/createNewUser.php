<?php
include "../Model/Includes/autoLoadCont.inc.php";
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
        header("Location: ../View/Header/Html/createNewUserForm?error=pwdMismatch&email=".$username."&fName=".$firstName."&lName=".$lastName);
        exit();
    }
    else
    {
            if($login -> checkExistingEmail($username))
            {
                header("Location: ../View/Header/Html/createNewUserForm?error=userTaken&fName=".$firstName."&lName=".$lastName);
                exit();
            }
            else
            {
               if(!$login -> createNewUser($username, $firstName, $lastName, $pwd))
               {
                header("Location: ../View/Header/Html/createNewUserForm?DatabaseError");
               }
               else
               {
                header("Location: ../home.php");
                $login->loginUser($username, $pwd);
                exit();
               }
               
            }
    }
    
    mysqli_close($conn);
}
else
{
    header("Location: ../View/Header/Html/createNewUserForm.html");
}
?>