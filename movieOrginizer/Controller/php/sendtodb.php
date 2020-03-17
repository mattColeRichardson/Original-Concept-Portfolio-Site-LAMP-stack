<?php
if(isset($_POST['submit']))
{
    session_start();
    $movieReview = $_POST["movieReview"];
    require "../../Model/php/databaseTools.php";
    $movieReview = new databaseTools("loginsystem");
    if(!isset($_COOKIE['movieTitle']))
    {
        echo "Error finding the movie you selected please select another.";
    }
    else
    {
        $movieTitle = $_COOKIE['movieTitle'];
        $mediaType = $_COOKIE['mediaType'];
        $movieReview -> addRating($movieTitle,$movieReview,$_SESSION['userId'],$mediaType);
    }
}
?>