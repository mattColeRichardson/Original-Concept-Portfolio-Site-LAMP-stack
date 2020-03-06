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

    public function lookupUser($value)//$dBName, $Row
    {
        //$sql = "SELECT ".$Collumn." FROM ".$dBName." WHERE ".$Row.";";
        
        $conn = mysqli_connect($this->servername, $this->dBUsername, $this->dBPassword, $this->name, $this->dbPort);
        $stmt = mysqli_stmt_init($conn);

        $sql = "SELECT * FROM users WHERE emailUsers=?;";

        if(!mysqli_stmt_prepare($stmt, $sql))
        {
            echo "False";
            mysqli_close($conn);
        }
        else 
        {
            mysqli_stmt_bind_param($stmt, "s", $value);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt); 
            return $result;
            mysqli_close($conn);
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
                mysqli_close($conn);
            }
            else
            {
                echo "Change successfull";
                mysqli_close($conn);
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
            mysqli_close($conn);
        }
        else 
        {
            mysqli_stmt_bind_param($stmt, "ss", $Pwd, $userid);
            if(!mysqli_stmt_execute($stmt))
            {
                echo "Change Failed";
                mysqli_close($conn);
            }
            else
            {
                echo "Change successfull";
                mysqli_close($conn);
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
            mysqli_close($conn);
        }
        else
        {
            $hashedpwd = password_hash($pwd, PASSWORD_DEFAULT);
            mysqli_stmt_bind_param($stmt, "ssss", $email, $first, $last, $hashedpwd);
            if(!mysqli_stmt_execute($stmt))
            {
                echo "Creation Failed";
                mysqli_close($conn);
            }
            else
            {
                echo "Creation successfull";
                mysqli_close($conn);
            }
        }
    }

    public function loginUser($username, $pwd, $userid)//needs to have already looked up the user id associated with the email.
    {

    }

    public function deleteUser($userid)
    {
        $conn = mysqli_connect($this->servername, $this->dBUsername, $this->dBPassword, $this->name, $this->dbPort);
        $stmt = mysqli_stmt_init($conn);

        $sql = "DELETE FROM users WHERE idusers=?";
        if(!mysqli_stmt_prepare($stmt, $sql))
        {
            echo "False";
            mysqli_close($conn);
        }
        else
        {
            mysqli_stmt_bind_param($stmt, "s", $userid);
            if(!mysqli_stmt_execute($stmt))
            {
                echo "Failed to delete";
                mysqli_close($conn);
            }
            else
            {
                echo "Sucessfull Deletion";
                mysqli_close($conn);
            }
        }
    }
    
    public function disconnect($dBName)
    {

    }
}
?>