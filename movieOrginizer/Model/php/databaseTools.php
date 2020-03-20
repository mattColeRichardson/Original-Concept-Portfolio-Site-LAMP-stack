<?php
class DatabaseTools
{
    private $servername = "localhost";
    private $dBUsername = "root";
    private $dBPassword = "Evaluate531246";
    private $dbPort = "3306";

    public function __construct($DBName)
    {
        //constructor
        $this->name = $DBName;
    }
//Login section------------------------------------------------------------------------------------------------------------------------------------------------------------
    public function lookupUser($id)//$dBName, $Row
    {
        //$sql = "SELECT ".$Collumn." FROM ".$dBName." WHERE ".$Row.";";
        $conn = mysqli_connect($this->servername, $this->dBUsername, $this->dBPassword, $this->name, $this->dbPort);
        $stmt = mysqli_stmt_init($conn);

        $sql = "SELECT * FROM users WHERE idusers=?;";

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
            $this->disconnect($conn,$stmt);
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
                $this->disconnect($conn,$stmt);
            }
            else
            {
                echo "Change successfull";
                $this->disconnect($conn,$stmt);
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
            $this->disconnect($conn,$stmt);
        }
        else 
        {
            mysqli_stmt_bind_param($stmt, "ss", $Pwd, $userid);
            if(!mysqli_stmt_execute($stmt))
            {
                echo "Change Failed";
                $this->disconnect($conn,$stmt);
            }
            else
            {
                echo "Change successfull";
                $this->disconnect($conn,$stmt);
            }
        }
    }

    public function checkExistingEmail($username)
    {
        $conn = mysqli_connect($this->servername, $this->dBUsername, $this->dBPassword, $this->name, $this->dbPort);
        $sql = "SELECT emailUsers FROM users WHERE emailUsers=?";
        $stmt = mysqli_stmt_init($conn,$stmt);

        if(!mysqli_stmt_prepare($stmt, $sql))
        {
            header("Location: ../../register?error=dbError");
            exit();
        }
        else
        {
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);

            if($resultCheck >0)
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
        $conn = mysqli_connect($this->servername, $this->dBUsername, $this->dBPassword, $this->name, $this->dbPort);
        $stmt = mysqli_stmt_init($conn);

        $sql = "INSERT INTO users (emailUsers, firstName, lastName, pwdUsers) VALUES (?, ?, ?, ?)";
        if(!mysqli_stmt_prepare($stmt, $sql))
        {
            $this->disconnect($conn,$stmt);
        }
        else
        {
            $hashedpwd = password_hash($pwd, PASSWORD_DEFAULT);
            mysqli_stmt_bind_param($stmt, "ssss", $email, $first, $last, $hashedpwd);
            if(!mysqli_stmt_execute($stmt))
            {
                $this->disconnect($conn,$stmt);
                return false;
            }
            else
            {
                $this->disconnect($conn,$stmt);
                return true;
            }
        }
    }

    public function loginUser($username, $pwd)
    {
        $conn = mysqli_connect($this->servername, $this->dBUsername, $this->dBPassword, $this->name, $this->dbPort);
        $stmt = mysqli_stmt_init($conn);
        $sql = "SELECT * FROM users WHERE emailUsers=?;";
        
        if(!mysqli_stmt_prepare($stmt, $sql))
        {
            header("Location: ../../login?error=DB&email=".$username);
        }
        else
        {
            mysqli_stmt_bind_param($stmt, 's', $username);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if($row = mysqli_fetch_assoc($result))
            {
                $pwdCheck = password_verify($pwd, $row['pwdUsers']);
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

                    //$hashedUserID = $_SESSION['userId'];
                    //setcookie("userID", $hashedUserID , time() + (86400). "/");

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
                $this->disconnect($conn,$stmt);
            }
            else
            {
                echo "Sucessfull Deletion";
                $this->disconnect($conn,$stmt);
            }
        }
    }
    //End of login section-----------------------------------------------------------------------------------------------------------------------------------------------

    public function disconnect($dBName, $stmt)
    {
        
        // mysqli_stmt_close($stmt);
        // mysqli_close($dBName);
    }

    //movie reviews section----------------------------------------------------------------------------------------------------------------------------------------------------------
    public function addRating($mediaTitle, $mediaRating, $userID, $mediaType, $mediaReview)
    {
        $conn = mysqli_connect($this->servername, $this->dBUsername, $this->dBPassword, $this->name, $this->dbPort);
        $stmt = mysqli_stmt_init($conn);
        $sql = "INSERT INTO ratedmovies (mediaTitle, mediaRating, idUsers, mediaType, review) VALUES (?, ?, ?, ?, ?)";
        if(!mysqli_stmt_prepare($stmt, $sql))
        {
            $this->disconnect($conn,$stmt);
        }
        else
        {
            mysqli_stmt_bind_param($stmt, "sssss", $mediaTitle, $mediaRating, $userID, $mediaType, $mediaReview);
            if(!mysqli_stmt_execute($stmt))
            {
                echo "there was a issue commiting your review to the database sorry try again later!";
                $this->disconnect($conn,$stmt);
                return false;
            }
            else
            {
                echo "Your Review has been commited to the database";
                $this->disconnect($conn,$stmt);
                return true;
            }
        }
    }

    public function checkIfRatingExist($idUsers, $mediaTitle)
    {
        $conn = mysqli_connect($this->servername, $this->dBUsername, $this->dBPassword, $this->name, $this->dbPort);
        $stmt = mysqli_stmt_init($conn);

        $sql = "SELECT idUsers FROM ratedmovies WHERE idUsers = ? AND mediaTitle = ? AND review IS NOT NULL";
        if(!mysqli_stmt_prepare($stmt, $sql))
        {
            $this->disconnect($conn,$stmt);
        }
        else
        {
            mysqli_stmt_bind_param($stmt, "ss",$idUsers, $mediaTitle);
            if(!mysqli_stmt_execute($stmt))
            {
               return false;
            }
            else
            {
                $result = mysqli_stmt_get_result($stmt);

                if(mysqli_num_rows($result)> 0)// figure this assosiative aray out tomorow.
                {
                    $this->disconnect($conn,$stmt);
                    return false;
                }
                else
                {
                    $this->disconnect($conn,$stmt);
                    return true;
                }
                $this->disconnect($conn,$stmt);     
            }
        }

        
        

    }
    public function changeRating($mediaID, $mediaRating)
    {
        //Where you will add a rating postumusly.
    }

    public function favMedia($mediaTitle,$mediaID)
    {
        //Where you will add a check to the favorite column of the ratings table
    }

    public function removeFav($mediaTitle,$mediaID)
    {
        //Where you will remove the fav from the list of movies you have already set as favorite.
    }

    public function createFavList($mediaTitle, $mediaID, $listTitle)
    {
        //Where you will create a list of movies that you can catagorize however you like.
    }

    public function removeFavList($listTitle, $userID)
    {
        //Where you will remove a Fav List from a account.
    }

    public function lookupUsersFavList($userID)
    {
        //Where you will be able to look at the list your friends have.
    }
    
    public function viewUsersFav($userID, $listTitle)
    {
        //the function that will allow you to select a fav from the brought up list.
    }
    //End of movie reviews section-----------------------------------------------------------------------------------------------------------------------------------------------
    public function sendUserMsg($userID, $messagePassed, $timeSent, $receivingUser)
    {

    }
    public function lookupUserMsg($userID)
    {

    }
}
?>