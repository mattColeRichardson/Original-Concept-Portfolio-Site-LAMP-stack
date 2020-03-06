<?php
if(isset($_POST['login-submit']))
{
    require 'dbhandler.php';
    $emailUid = $_POST['userEmail'];
    $password = $_POST['pwd'];

    if(empty($emailUid) || empty($password))
    {
        header("Location: ../../login?error=blankFields&email=".$emailUid);
    }
    else
    {
        $sql = "SELECT * FROM users WHERE emailUsers=?;";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql))
        {
            header("Location: ../../login?error=DB&email=".$emailUid);
        }
        else
        {
            mysqli_stmt_bind_param($stmt, 's', $emailUid);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if($row = mysqli_fetch_assoc($result))
            {
                $pwdCheck = password_verify($password, $row['pwdUsers']);
                if ($pwdCheck == false)
                {
                    header("Location: ../../login?error=InvalUsrPwd1");
                    exit();
                }
                elseif($pwdCheck == true)
                {
                    session_start();
                    $_SESSION['userId'] = $row['idusers'];
                    $_SESSION['emailUser'] = $row['emailUsers'];
                    $_SESSION['fNameUser'] = $row['firstName'];
                    $_SESSION['lNameUser'] = $row['lastName'];

                    header("Location: ../../home?login=success");
                    exit();
                }
                else
                {
                    header("Location: ../../login?error=InvalUsrPwd2");
                    exit();
                }
            }
            else
            {
                header("Location: ../../login?error=InvalUsrPwd3");
                exit();
            }
        }
    }
}
else
{
    header("Location: ../../login");
    exit();
}
?>