<link rel="stylesheet" href="../view/css/main.css">
<?php
if($_POST["highEnd"] != null)
{
    $priceQuoted = $_POST["highEnd"];
    $teamMemBef = $_POST["teamMembers"];
    $teamMemAft = $_POST["teamMembers2"];
    $hoursWorked = $_POST["hours"];
    $minWorked = $_POST["min"];
    $costOfTime = .75;

    $moneyLeft = ((($priceQuoted / $teamMemBef) - (($hoursWorked * 60) + $minWorked)* $costOfTime) * $teamMemBef) ;
    $timeInMinLeft = (($moneyLeft / $costOfTime  ) / ($teamMemBef + $teamMemAft));

    $timeInHoursLeft = intdiv($timeInMinLeft, 60);
    $remInMinLeft = ($timeInMinLeft % 60);

    //echo ("Cost this much up till now: ".$costuptillnow);
    echo('
        <h1>You have this long left to get the job done!</h1><hr/></br>
    ');
    echo( "
    <div class = 'timeLeft'>Hours : ". $timeInHoursLeft. "</br> Min : ". $remInMinLeft. "</div>
    ");
    echo("Money left to work with before new people added = ".$moneyLeft."<br/>");
    echo("Time in min left = ".$timeInMinLeft."<br/>");
    echo("Answer in hours = ".$timeInHoursLeft)."<br/>";
    echo("Answer Remainder Min = ".$remInMinLeft."<br/>");
    

}
else
{
    header("Location: ../view/home?highEnd=Noinput");
    exit();
}


?>



