<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $connection = new PDO("mysql:host=localhost;dbname=fourcorners","root","");
    $sql = "DELETE FROM user WHERE User_ID = :id";

    $hashed_password = password_hash($_POST["User_Password"], PASSWORD_DEFAULT);

    // preparing query fro insertion.
    $result = $connection->prepare($sql);
    $result->execute(array(
        // receive values from input form and inserting them into our db
        ":id" => $_POST["User_ID"]
    ));

    // Calling fetch function 
    $data = $result->fetch();

    print_r($data); // displaying it to see if we are getting correct values.

    // recho responsive string
    echo "Done.";

    ?>
