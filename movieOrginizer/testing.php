<?php
require "Model/php/databaseTools.php";
$loginData = new databaseTools("loginsystem");
$loginData -> lookupUser("testemail@gmail.com");


?>
<html>
    <div>
        <form action="Submit" method="POST">
            <input type="text" id="New user">
            <button type="submit">Submit.</button>
        </form>
    </div>
</html>