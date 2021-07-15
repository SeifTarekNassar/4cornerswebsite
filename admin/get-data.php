<?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $connection = new PDO("mysql:host=localhost;dbname=fourcorners","root","");
    $sql = "SELECT * FROM user";

    // calling query func to excute the query and save its instance in result variable. 
    $result = $connection->query($sql);

    // returning response in json format ,to get all rows
    echo json_encode($result->fetchAll());


    ?>
