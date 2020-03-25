<?php
require_once "DbConnection.php";
class loginTools extends Conn
{
    public function lookupUser($id)//$dBName, $Row
    {
        $conn = $this->connect("loginsystem");
        $sql = "SELECT firstName FROM users WHERE idusers=?";
        

        if(!$stmt = $conn->prepare($sql))
        {
            echo "False";
            $this->disconnect($conn, $stmt);
        }
        else 
        {
            $stmt->bind_param( "s", $id);
            $stmt->execute();
            $stmt->bind_result($result); 
            
            $this->disconnect($conn);
            return $result;
        }
    }

    public function updateUsersEmail($email, $userid)
    {
        $conn = $this->connect("loginsystem");
        $sql = "UPDATE users SET emailUsers=? WHERE idusers=?";
        
        if(!$stmt = $conn->prepare($sql))
        {
            echo "False";
            $this->disconnect($conn);
        }
        else 
        {
            $stmt->bind_param( "ss", $email, $userid);
            if(!$stmt->execute())
            {
                echo "Change Failed";
                $this->disconnect($conn);
            }
            else
            {
                echo "Change successfull";
                $this->disconnect($conn);
            }
        }
    }
    
    public function updateUsersPwd($Pwd, $userid)
    {
        $conn = $this->connect("loginsystem");
        $sql = "UPDATE users SET pwdUsers=? WHERE idusers=?";
        
        if(!$stmt = $conn->prepare($sql))
        {
            echo "False";
            $this->disconnect($conn);
        }
        else 
        {
            $stmt->bind_param( "ss", $Pwd, $userid);
            if(!$stmt->execute())
            {
                echo "Change Failed";
                $this->disconnect($conn);
            }
            else
            {
                echo "Change successfull";
                $this->disconnect($conn);
            }
        }
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

    public function createNewUser($email, $first, $last, $pwd)
    {
        $conn = $this->connect("loginsystem");
        $sql = "INSERT INTO users (emailUsers, firstName, lastName, pwdUsers) VALUES (?, ?, ?, ?)";
        

        if(!$stmt = $conn->prepare($sql))
        {
            $this->disconnect($conn);
        }
        else
        {
            $hashedpwd = password_hash($pwd, PASSWORD_DEFAULT);
            $stmt->bind_param( "ssss", $email, $first, $last, $hashedpwd);
            if(!$stmt->execute())
            {
                $this->disconnect($conn);
                return false;
            }
            else
            {
                $this->disconnect($conn);
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
            header("Location: ../../login?error=DB&email=".$username);
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
                    header("Location: ../../login?error=InvalUsrPwd1");
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
                    
                    header("Location: ../../home?login=success");
                    $result->free();
                    exit();
                }
                else
                {
                    header("Location: ../../login?error=InvalUsrPwd2");
                    $result->free();
                    exit();
                }
            }
            else
            {
                header("Location: ../../login?error=InvalUsrPwd3");
                $result->free();
                exit();
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
            
            $this->disconnect($conn);
        }
        else
        {
            $stmt->bind_param("s", $userid);
            if(!$stmt->execute())
            {
                echo "Failed to delete";
                
                $this->disconnect($conn);
            }
            else
            {
                echo "Sucessfull Deletion";
                
                $this->disconnect($conn);
            }
        }
    }
}
?>