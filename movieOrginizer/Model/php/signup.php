<?php
if(isset($_POST['signup-submit']))
{
    require 'dbhandler.php';

    $username = $_POST['email'];
    $pwd = $_POST['Pwd'];
    $RepeatPwd = $_POST['RepeatPwd'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];

    if ($pwd !== $RepeatPwd) // check in js that all fields are entered
    {
        header("Location: ../../register?error=pwdMismatch&email=".$username."&fName=".$firstName."&lName=".$lastName);
        exit();
    }
    else
    {
        $sql = "SELECT emailUsers FROM users WHERE emailUsers=?";
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql))
        {
            header("Location: ../../register?error=dbError");
            exit();
        }
        else
        {
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);

            if($resultCheck >0)
            {
                header("Location: ../../register?error=userTaken&fName=".$firstName."&lName=".$lastName);
                exit();
            }
            else
            {
                $sql = "INSERT INTO users (emailUsers, firstName, lastName, pwdUsers) VALUES (?, ?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt, $sql))
                {
                    header("Location: ../../register?error=dbError");
                    exit();
                }
                else
                {
                    $hashedpwd = password_hash($pwd, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt, "ssss", $username, $firstName, $lastName, $hashedpwd);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../../register?signup=success");
                    exit();
                }
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
else
{
    header("Location: ../../register.html");
}
?>