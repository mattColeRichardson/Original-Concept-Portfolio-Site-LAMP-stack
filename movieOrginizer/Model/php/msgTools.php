<?php
require_once "DbConnection.php";
class msgTools extends Conn
{
    public function sendUserMsg($userID, $messagePassed, $timeSent, $receivingUser)
    {
        $conn = $this->connect("messages");
        $sql = "INSERT INTO allmsgs (userID , msg, timeSent, ID) VALUES (?, ?, ?, ?)";
        
        if(!$stmt = $conn->prepare($sql))
        {
            echo "False";
            $this->disconnect($conn);
        }
        else 
        {
            $stmt->bind_param("ssss", $userID, $messagePassed, $timeSent, $receivingUser);
            $stmt->execute();
            $this->disconnect($conn);
        }
    }
    public function lookupUsersMsgs($userID)
    {
        $conn = $this->connect("messages");
        $sql = "SELECT msg FROM allmsgs WHERE userID=?";

        if(!$stmt = $conn->prepare($sql))
        {
            echo "False";
            $this->disconnect($conn);
        }
        else 
        {
            $stmt->bind_param("s", $userID);
            $stmt->execute();
            $stmt->bind_result($msg); 
            $this->disconnect($conn);
            $row = $result->fetch_array(MYSQLI_NUM);
            return $row;
        }
    }
    public function lookupSingleMsg($userID, $ID)
    {
        $conn = $this->connect("messages");
        $stmt = mysqli_stmt_init($conn);

        $sql = "SELECT * FROM messages WHERE userID=? AND ID=?";

        if(!mysqli_stmt_prepare($stmt, $sql))
        {
            echo "False";
            
            $this->disconnect($conn);
        }
        else 
        {
            mysqli_stmt_bind_param($stmt, "ss", $userID, $ID);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt); 
            
            $this->disconnect($conn);
            $row = mysqli_fetch_array($result);
            return $row;
        }
    }
}
?>