<?php
class Login extends DbConnect
{
    public function loginUser($username, $pwd)
    {
        $conn = $this->connect("loginsystem");
        if (mysqli_connect_errno()) {
            printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
        }
        
        if(!$stmt = $conn->prepare("SELECT idusers, emailUsers, pwdUsers, firstName, lastName FROM users WHERE emailUsers=?"))
        {
            header("Location: ../login?error=DB&email=".$username);
        }
        else
        {
            $stmt->bind_param('s', $username);
            $stmt->execute();
            $stmt->bind_result($id, $email, $pwdUsers, $firstName, $lastName);
            if($row = $stmt ->fetch())
            {
                $pwdCheck = password_verify($pwd, $pwdUsers);
                if ($pwdCheck == false)
                {
                    header("Location: ../login?error=InvalUsrPwd1");
                    $result->free();
                    exit();
                }
                elseif($pwdCheck == true)
                {
                    session_start();
                    $_SESSION['userId'] = $id;
                    $_SESSION['emailUser'] = $email;
                    $_SESSION['fNameUser'] = $firstName;
                    $_SESSION['lNameUser'] = $lastName;
                    
                    header("Location: ../home?login=success");
                    $result->free();
                    exit();
                }
                else
                {
                    header("Location: ../login?error=InvalUsrPwd2");
                    $result->free();
                    exit();
                }
            }
            else
            {
                header("Location: ../login?error=InvalUsrPwd3");
                $result->free();
                exit();
            }
        }
    }
    public function logoutUser()
    {
        session_start();
        session_unset();
        session_destroy();
        header("Location: ../home");
    }
}
?>