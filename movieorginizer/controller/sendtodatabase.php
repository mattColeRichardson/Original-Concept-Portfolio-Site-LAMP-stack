<?php
if(isset($_POST['submit']))
{
    session_start();
    include "../model/includes/autoloadcont.inc.php";
    $movieReview = new Review();
    if(!isset($_COOKIE['movieTitle']))
    {
        echo "Error finding the movie you selected please select another.";
    }
    else
    {
        $movieTitle = $_COOKIE['movieTitle'];
        $Rating = $_COOKIE["selectedRating"];
        $userId = $_SESSION['userId'];
        $mediaType = $_COOKIE['mediaType'];
        $Review = $_POST["movieReview"];
        if (!$movieReview->checkIfRatingExist($userId,$movieTitle))
        {
            header("Location: ../home?AlreadyRatedThatMovie");
        }
        else
        {
            if (!$movieReview -> addNewRating($movieTitle, $Rating, $mediaType, $userId, $Review))
            {
                header("Location: ../home?Error=True");
            }
            else 
            {
                header("Location: ../home?Successfull");
            }
        }
        
    }
}
?>