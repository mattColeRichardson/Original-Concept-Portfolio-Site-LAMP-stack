<?php
class Review extends DbConnect
{
    public function addNewRating($mediaTitle, $mediaRating, $mediaType, $idUsers, $review)
    {
        $conn = $this->connect("ratings");
        $sql = "INSERT INTO ratedmovies (mediaTitle, mediaRating, mediaType, idUsers, review) VALUES (?, ?, ?, ?, ?)";
        
        if(!$stmt = $conn->prepare($sql))
        {
            throw new Exception('Could not connect to the database.');
            return false;
        }
        else
        {
            $stmt->bind_param( "sssss", $mediaTitle, $mediaRating, $mediaType, $idUsers, $review);
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
    public function checkIfRatingExist($userId, $movieTitle)
    {
        $conn = $this->connect("ratings");
        if (mysqli_connect_errno()) {
            printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
        }
        
        if(!$stmt = $conn->prepare("SELECT review FROM ratedmovies WHERE idUsers=? AND mediaTitle=?"))
        {
            throw new Exception("could not prepare and send to the database");
        }
        else
        {
            $stmt->bind_param('ss', $userId, $movieTitle);
            $stmt->execute();
            $stmt->store_result();
            if($stmt->num_rows > 0)
            {
                return false;
            }
            else
            {
                return true;
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
        $conn = $this->connect("ratings");
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
        $conn = $this->connect("ratings");
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
}
?>