<?php
    $serveur = "mysql";
    $dbname = "website_db";
    $user = "root";
    $pass = "root";
    
    try {
        $conn_user1 = new PDO("mysql:host=$serveur;dbname=$dbname", $user, $pass);
        $conn_user1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo 'Connected successfully to the database !';
    }
    catch(PDOException $e) {
        echo 'Could not connect to the database: ' . $e->getMessage();
        $conn_user1 = null;
    }
?>