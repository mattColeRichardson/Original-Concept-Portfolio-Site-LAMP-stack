<?php
require "Model/php/databaseTools.php";
$login = new databaseTools("loginsystem");
$login -> loginUser("testemail@gmail.com", "531246");


?>
<html>
    <div>
        <form action="Submit" method="POST">
            <input type="text" id="New user">
            <button type="submit">Submit.</button>
        </form>
    </div>
</html>