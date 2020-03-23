<link href="view/css/myMovies.css" rel="stylesheet">
<table style = "width:100%">
    <tr>
        <th>Movie Title</th>
        <th>Movie Review</th>
        <th>Movie Rating</th>
        
        <div class = "Collumn">
            <?php 
            $Data->pullRatingTitle($_SESSION['userId']);
            ?>
        </div>
    </tr>
</table>