<?php
    $servername = 'localhost';
    $username = 'collinsworth';
    $password = 'GS5W3';
    $dbname = 'collinsworth';
    
    try {
        $db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        echo $error_message;
        exit();
    }