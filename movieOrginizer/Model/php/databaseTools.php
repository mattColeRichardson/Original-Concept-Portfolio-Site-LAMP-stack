<?php
class DatabaseTools
{
    //private $user = $_SESSION['userId']; // these get called when the object gets created
    //private $userEmail = $_SESSION['emailUser'];
    private $servername = "localhost";
    private $dBUsername = "root";
    private $dBPassword = "Evaluate531246";
    private $dbPort = "3306";

    public function __construct($Name)
    {
        //constructor
        $this->name = $Name;
    }

    public function lookupUser($id)//$dBName, $Row
    {
        //$sql = "SELECT ".$Collumn." FROM ".$dBName." WHERE ".$Row.";";
        $conn = mysqli_connect($this->servername, $this->dBUsername, $this->dBPassword, $this->name, $this->dbPort);
        $stmt = mysqli_stmt_init($conn);

        $sql = "SELECT * FROM users WHERE idusers=?;";

        if(!mysqli_stmt_prepare($stmt, $sql))
        {
            echo "False";
            $this->disconnect($conn);
        }
        else 
        {
            mysqli_stmt_bind_param($stmt, "s", $id);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt); 
            $this->disconnect($conn);
            return $result;
        }
    }

    public function updateUsersEmail($email, $userid)
    {
        $conn = mysqli_connect($this->servername, $this->dBUsername, $this->dBPassword, $this->name, $this->dbPort);
        $stmt = mysqli_stmt_init($conn);

        $sql = "UPDATE users SET emailUsers=? WHERE idusers=?;";// need to change the sql statemetnt to retrieve data.

        if(!mysqli_stmt_prepare($stmt, $sql))
        {
            echo "False";
            mysqli_close($conn);
        }
        else 
        {
            mysqli_stmt_bind_param($stmt, "ss", $email, $userid);
            if(!mysqli_stmt_execute($stmt))
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
        $conn = mysqli_connect($this->servername, $this->dBUsername, $this->dBPassword, $this->name, $this->dbPort);
        $stmt = mysqli_stmt_init($conn);

        $sql = "UPDATE users SET pwdUsers=? WHERE idusers=?;";// need to change the sql statemetnt to retrieve data.

        if(!mysqli_stmt_prepare($stmt, $sql))
        {
            echo "False";
            $this->disconnect($conn);
        }
        else 
        {
            mysqli_stmt_bind_param($stmt, "ss", $Pwd, $userid);
            if(!mysqli_stmt_execute($stmt))
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

    public function createNewUser($email, $first, $last, $pwd)
    {
        $conn = mysqli_connect($this->servername, $this->dBUsername, $this->dBPassword, $this->name, $this->dbPort);
        $stmt = mysqli_stmt_init($conn);

        $sql = "INSERT INTO users (emailUsers, firstName, lastName, pwdUsers) VALUES (?, ?, ?, ?)";
        if(!mysqli_stmt_prepare($stmt, $sql))
        {
            echo "False";
            $this->disconnect($conn);
        }
        else
        {
            $hashedpwd = password_hash($pwd, PASSWORD_DEFAULT);
            mysqli_stmt_bind_param($stmt, "ssss", $email, $first, $last, $hashedpwd);
            if(!mysqli_stmt_execute($stmt))
            {
                echo "Creation Failed";
                $this->disconnect($conn);
            }
            else
            {
                echo "Creation successfull";
                $this->disconnect($conn);
            }
        }
    }

    public function loginUser($username, $pwd)//needs to have already looked up the user id associated with the email.
    {
        $conn = mysqli_connect($this->servername, $this->dBUsername, $this->dBPassword, $this->name, $this->dbPort);
        $stmt = mysqli_stmt_init($conn);
        $sql = "SELECT * FROM users WHERE emailUsers=?;";
        
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

    public function deleteUser($userid)
    {
        $conn = mysqli_connect($this->servername, $this->dBUsername, $this->dBPassword, $this->name, $this->dbPort);
        $stmt = mysqli_stmt_init($conn);

        $sql = "DELETE FROM users WHERE idusers=?";
        if(!mysqli_stmt_prepare($stmt, $sql))
        {
            echo "False";
            $this->disconnect($conn);
        }
        else
        {
            mysqli_stmt_bind_param($stmt, "s", $userid);
            if(!mysqli_stmt_execute($stmt))
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
    
    public function disconnect($dBName)
    {
        mysqli_close($dBName);
    }
}
?>