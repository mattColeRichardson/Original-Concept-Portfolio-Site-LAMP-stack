<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="chrome">
    <link rel="stylesheet" href="css/main.css">
    <title>Detlta Time</title>
</head>
<body>
    <div class= "content">
        <form class="form" action="../model/calc.php" method="POST">
            <h2>Highend price quoted:</h2>
            <input name="highEnd" type="number" placeholder="High Price Quoted to Customer">
            <hr/>
            <div>
                <h2>How many team members did you have to start</h2>
                <select id = "startTeam" class = "teamMemSelect" name="teamMembers" id="TeamMembersBefore">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                </select>
            </div>
            <hr/>
            <div>
                <h2>How many team members did you add?</h2>
                <select id = "addTeam" class = "teamMemSelect" name="teamMembers2" id="TeamMembersBefore">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                </select>
            </div>
            <hr/>
            <h2>How long have you been working?</h2>
            <div class="timeDiv">
                <div class = "timeSet">
                <span class="timeTitle">hours</span>
                <select id = "hoursSelect" class = "timeSelect hours" name="hours" id="timeInHours" placeholder="hours">
                    <option value="0">0 hours</option>
                    <option value="1">1 hours</option>
                    <option value="2">2 hours</option>
                    <option value="3">3 hours</option>
                    <option value="4">4 hours</option>
                    <option value="5">5 hours</option>
                    <option value="6">6 hours</option>
                    <option value="7">7 hours</option>
                    <option value="8">8 hours</option>
                    <option value="9">9 hours</option>
                </select>
                </div>
                <div class = "timeSet">
                <span class="timeTitle">mins</span>
                <select id = "minSelect" class = "timeSelect min" name="min" id="timeInMin">
                    <option value="0">0</option>
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="15">15</option>
                    <option value="20">20</option>
                    <option value="25">25</option>
                    <option value="30">30</option>
                    <option value="35">35</option>
                    <option value="40">40</option>
                    <option value="45">45</option>
                    <option value="50">50</option>
                    <option value="55">55</option>
                </select>
                </div>
            </div>
            <hr/>
            <button class="submit" type="submit">Submit</button>
        </form>
    </div>   
</body>
</html>