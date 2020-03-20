<?php
if(isset($_POST['submit']))
{
    session_start();
    
    require "../../Model/php/databaseTools.php";
    $movieReview = new databaseTools("ratings");
    if(!isset($_COOKIE['movieTitle']))
    {
        echo "Error finding the movie you selected please select another.";
    }
    else
    {
        $movieTitle = $_COOKIE['movieTitle'];
        $Rating = 0;
        $userId = $_SESSION['userId'];
        $mediaType = $_COOKIE['mediaType'];
        $Review = $_POST["movieReview"];
        if (!$movieReview ->checkIfRatingExist($userId,$movieTitle))
        {
            header("Location: ../../home?AlreadyRatedThatMovie");
        }
        else
        {
            if (!$movieReview -> addRating($movieTitle, $Rating, $userId, $mediaType, $Review))
            {
                header("Location: ../../home?Error=True");
            }
            else 
            {
                header("Location: ../../home?Successfull");
            }
        }
        
    }
}
?>