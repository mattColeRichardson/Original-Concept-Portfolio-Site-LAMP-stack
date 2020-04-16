<?php
session_start();
include "../model/includes/autoloadcont.inc.php";
$reviews = new Review;
$ratingID = $_POST['ratingID'];
$user = $_SESSION['userId'];
$reviews->deleteRating($user, $ratingID);
?>