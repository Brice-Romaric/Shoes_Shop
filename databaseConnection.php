<?php
    $url="localhost";
    $nom="root";
    $mdp="";
    $db="OBRO";
        $conn=new mysqli($url,$nom,$mdp,$db);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
