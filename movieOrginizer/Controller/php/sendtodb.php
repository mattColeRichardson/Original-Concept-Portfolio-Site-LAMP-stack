<?php
if(isset($_POST['submit']))
{
    session_start();
    $Review = $_POST["movieReview"];
    $Rating = "0";
    require "../../Model/php/databaseTools.php";
    $movieReview = new databaseTools("ratings");
    if(!isset($_COOKIE['movieTitle']))
    {
        echo "Error finding the movie you selected please select another.";
    }
    else
    {
        $movieTitle = $_COOKIE['movieTitle'];
        $mediaType = $_COOKIE['mediaType'];
        $userId = $_SESSION['userId'];
        if (!$movieReview -> addRating($movieTitle,$Rating,$userId,$mediaType,$Review))
        {
            echo "could not complete your request";
        }
        else 
        {
            echo "Gotcha";
        }
    }
}
?>