
<head>
    <script src="model/js/jquery/jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" href="view/css/reset.css">
    <link rel="stylesheet" href="view/css/header.css">
    <link rel="stylesheet" href="view/css/reviews.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Reviews</title>
</head>
<header>
<?php
session_start();
include 'model/includes/autoload.inc.php';
if (!isset($_SESSION['userId']))
{
    include 'view/header/headerloggedout.php';
}
else
{
    include 'view/header/headerloggedin.php';
}
$reviews = new Review();
?>
</header>
<body>
<div class="container"> 
    <h1>Your Reviews for movies and tv shows.</h1>
    <div class="buttons">
        <button id="showsort">Tv Shows</button>
        <button id="moviesort">Movies</button>
        <button id="favsort">My favs</button>
        <button id="worstsort">Worst Media</button>
    </div>
    <title>Your reviews table</title>
    <div class="reviewTable" id = "reviewSection">
        <div class="TableHeaderContainer">
            <h2 class = "TableHead">Movie Title</h2>
            <h2 class = "TableHead">Rating</h2>
            <h2 class = "TableHead">Review</h2>
            <h2 class = "TableHead">Delete?</h2>
        </div>
        <div class="reviewData">
        <?php
        $usersReviews = $reviews->lookupReviewForTable($_SESSION['userId']);
        ?>
        </div>
        
    </div>
    
</div>
    
</body>
<footer>
    <script src="controller/myreviewdeletebutton.js"></script>
    <script src="controller/myrevieworginizebuttons.js"></script>
</footer>