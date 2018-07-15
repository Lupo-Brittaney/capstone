<?php
    $dsn = 'mysql:host=localhost;dbname=familyga_colorado_wild';
    $username = 'familyga_iClient';
    $password = 'Degree4Me!!';

    try {
        $db = new PDO($dsn, $username, $password);
        //echo 'connectoin successful';
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        //include('error_database.php');
        echo $e->getMessage();
        exit();
    }
?>