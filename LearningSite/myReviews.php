
<head>
    <script src="Model/JS/Jquery/jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" href="View/Css/reset.css">
    <link rel="stylesheet" href="View/Css/header.css">
    <link rel="stylesheet" href="View/Css/reviews.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Reviews</title>
</head>
<header>
<?php
session_start();
include 'Model/Includes/autoLoad.inc.php';
if (!isset($_SESSION['userId']))
{
    include 'View/Header/headerLoggedOut.php';
}
else
{
    include 'View/Header/headerLoggedIn.php';
}
$reviews = new Review();
?>
</header>
<body>
<div class="container"> 
    <h1>Your Reviews for movies and tv shows.</h1>
    <div class="buttons">
        <button>Tv Shows</button>
        <button>Movies</button>
        <button>My favs</button>
        <button>Worst movies</button>
    </div>
    <title>Yoiur reviews table</title>
    <div class="reviewTable">
        <h2 class = "TableHead">Movie Title</h2>
        <h2 class = "TableHead">Review</h2>
        <h2 class = "TableHead">Rating</h2>
        <h2 class = "TableHead">Delete?</h2>
        <?php
        $usersReviews = $reviews->lookupReviewForTable($_SESSION['userId']);
        ?>
    </div>
    
</div>
    
</body>
<footer>
    <script src="Controller/myReviewDeleteButton.js"></script>
    <script src="Controller/myReviewOrginizeButtons.js"></script>
</footer>