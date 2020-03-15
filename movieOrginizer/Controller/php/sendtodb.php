<?php
if(isset($_POST['submit']))
{
    $movieReview = $_POST("movieReview");
    
    require "../../Model/php/databaseTools.php"
    $login = new databaseTools("loginsystem");
}
?>