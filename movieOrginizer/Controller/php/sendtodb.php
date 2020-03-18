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
            //redirect to a page explaining what happened.
            echo "you have already rated that video.";
        }
        else
        {
            if (!$movieReview -> addRating($movieTitle, $Rating, $userId, $mediaType, $Review))
            {
                echo "could not complete your request";
            }
            else 
            {
                echo "Gotcha";
            }
        }
        
    }
}
?>