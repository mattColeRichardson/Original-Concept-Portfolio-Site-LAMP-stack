<?php
if(isset($_POST['submit']))
{
    $movieReview = $_POST["movieReview"];
    require "../../Model/php/databaseTools.php";
    $login = new databaseTools("loginsystem");
    if(!isset($_COOKIE['movieTitle']))
    {
        echo "Error finding the movie you selected please select another.";
    }
    else
    {
        $movieTitle = $_COOKIE['movieTitle'];
        echo "your movie Tilte is :". $movieTitle;
    }
}
?>