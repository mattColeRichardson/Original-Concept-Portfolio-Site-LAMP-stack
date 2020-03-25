<?php
    public function sendUserMsg($userID, $messagePassed, $timeSent, $receivingUser)
    {
        $conn = mysqli_connect($this->servername, $this->dBUsername, $this->dbPassword, $this->name, $this->dbPort);
        $stmt = mysqli_stmt_init($conn);

        $sql = "INSERT INTO allmsgs (userID , msg, timeSent, ID) VALUES (?, ?, ?, ?)";
        
        if(!mysqli_stmt_prepare($stmt, $sql))
        {
            echo "False";
            $this->disconnect($conn, $stmt);
        }
        else 
        {
            mysqli_stmt_bind_param($stmt, "ssss", $userID, $messagePassed, $timeSent, $receivingUser);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt); 
            
            $this->disconnect($conn);
        }
    }
    public function whoSentMsg($id)//$dBName, $Row
    {
        $conn = mysqli_connect($this->servername, $this->dBUsername, $this->dbPassword, "loginsystem", $this->dbPort);
        $stmt = mysqli_stmt_init($conn);

        $sql = "SELECT firstName FROM users WHERE idusers=?";

        if(!mysqli_stmt_prepare($stmt, $sql))
        {
            echo "False";
            $this->disconnect($conn, $stmt);
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
    public function lookupUsersMsgs($userID)
    {
        $conn = mysqli_connect($this->servername, $this->dBUsername, $this->dbPassword, $this->name, $this->dbPort);
        $stmt = mysqli_stmt_init($conn);

        $sql = "SELECT * FROM allmsgs WHERE userID=?";

        if(!mysqli_stmt_prepare($stmt, $sql))
        {
            echo "False";
            
            $this->disconnect($conn);
        }
        else 
        {
            mysqli_stmt_bind_param($stmt, "s", $userID);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt); 
            
            $this->disconnect($conn);
            $row = mysqli_fetch_array($result);
            return $row;
        }
    }
    
    
    public function lookupSingleMsg($userID, $ID)
    {
        $conn = mysqli_connect($this->servername, $this->dBUsername, $this->dbPassword, $this->name, $this->dbPort);
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
?>