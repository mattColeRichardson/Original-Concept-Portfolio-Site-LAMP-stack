<?php
    $emailUid = $_POST['userEmail'];
    $password = $_POST['pwd'];
    require './Model/php/databaseTools.php';
    $login = new databaseTools("loginsystem");
    
?>