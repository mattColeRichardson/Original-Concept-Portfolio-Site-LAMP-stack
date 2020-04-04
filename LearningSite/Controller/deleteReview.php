<?php
session_start();
include "../Model/Includes/autoLoadCont.inc.php";
$reviews = new Review;
$ratingID = json_decode($_POST['ratingID']);
$user = $_SESSION['userId'];
$reviews->deleteRating($user, $ratingID);
?>