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
    public function deleteRating($userid, $reviewId)
    {
        $conn = $this->connect("ratings");
        $sql = "DELETE FROM ratedmovies WHERE IdUsers=? AND ID=?";
        
        if(!$stmt = $conn->prepare($sql))
        {
            echo "False";
        }
        else
        {
            $stmt->bind_param("ss", $userid, $reviewId);
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
    public function spitOutReview($movieTitle, $review, $rating, $userId)//need the userID for the delete process after i finish the table display
    {
        echo "<h3>".$movieTitle."<h3>"."<span>".$review."</span>"."<span>".$rating."</span>"."<button class=".$userId." deleteRating>Delete</button>";
    }
    public function lookupReviewForTable($idUsers)
    {
        $conn = $this->connect("ratings");
        $sql = "SELECT mediaTitle, mediaRating, review FROM ratedmovies WHERE IdUsers=?"; //Still working on the lodgic behind pulling data from the database to parse into a table.

        if(!$stmt = $conn->prepare($sql))
        {
            header("Location: myReviews?error=dbError");
        }
        else{
            $stmt->bind_param( "s", $idUsers);
            $stmt->execute();
            $result = $stmt->get_result();
            $i = 0;
            $count = 0;
            while($row = $result->fetch_array(MYSQLI_NUM))
            {
                foreach($row as $r)
                {
                    if($count < ($result->num_rows * 3) - 1)
                    {
                        if ($i <= 2)
                        {
                            echo "<h3 class = 'userData'> $r </h3>";
                            $i++;
                        }
                        else
                        {
                            echo "<button class=".$idUsers." deleteRating>Delete</button>"; // Need to figure out what to pass to the button to do the deleting of the data later.
                            echo "<h3 class = 'userData'> $r </h3>";
                            $i=0;
                        }
                    }
                    else{
                        echo "<h3 class = 'userData'> $r </h3>";
                        echo "<button class=".$idUsers." deleteRating>Delete</button>";
                    }
                    $count++;
                }
            }  
        }
    }
}
?>