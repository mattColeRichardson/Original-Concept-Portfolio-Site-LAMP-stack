<?php
class Login extends DbConnect
{
    public function createNewUser($email, $first, $last, $pwd)
    {
        $conn = $this->connect("loginsystem");
        $sql = "INSERT INTO users (emailUsers, firstName, lastName, pwdUsers) VALUES (?, ?, ?, ?)";
        
        if(!$stmt = $conn->prepare($sql))
        {
            throw new Exception('Could not connect to the database.');
            return false;
        }
        else
        {
            $hashedpwd = password_hash($pwd, PASSWORD_DEFAULT);
            $stmt->bind_param( "ssss", $email, $first, $last, $hashedpwd);
            if(!$stmt->execute())
            {  
                return false;
            }
            else
            {
                return true;
            }
        }
    }
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
    public function checkExistingEmail($username)
    {
        $conn = $this->connect("loginsystem");
        $sql = "SELECT emailUsers FROM users WHERE emailUsers=?";
        
        if(!$stmt = $conn->prepare($sql))
        {
            header("Location: ../../register?error=dbError");
            exit();
        }
        else
        {
            $stmt->bind_param( "s", $username);
            $stmt->execute();
            $stmt->store_result();

            if($stmt->num_rows>0)
            {
                return true;
            }
            else
            {
                return false;
            }
        }
    }
    public function deleteUser($userid)
    {
        $conn = $this->connect("loginsystem");
        $sql = "DELETE FROM users WHERE idusers=?";
        
        if(!$stmt = $conn->prepare($sql))
        {
            echo "False";
        }
        else
        {
            $stmt->bind_param("s", $userid);
            if(!$stmt->execute())
            {
                echo "Failed to delete";
            }
            else
            {
                echo "Sucessfull Deletion";
            }
        }
    }
    public function checkUserPassword($password, $userid)
    {
        $conn = $this->connect("loginsystem");
        if (mysqli_connect_errno()) {
            printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
        }
        if(!$stmt = $conn->prepare("SELECT pwdUsers FROM users WHERE idusers=?"))
        {
            throw new Exception('Could not connect to the database.');
        }
        else
        {
            $stmt->bind_param('s', $userid);
            $stmt->execute();
            $stmt->bind_result($pwdUsers);

            if($row = $stmt ->fetch())
            {
                $pwdCheck = password_verify($password, $pwdUsers);
                if($pwdCheck)
                {
                    return true;
                }
                else
                {
                    return false;
                }
            }
            else
            {
                throw new Exception('Could not connect to the database.');
            }
        }

    }
}
?>