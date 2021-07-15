<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $connection = new PDO("mysql:host=localhost;dbname=fourcorners","root","");
    $sql = "INSERT INTO user (User_FirstName, User_LastName, User_Address, User_DOB, User_Password, Admin_privelage) VALUES(:firstName, :lastName, :addresss,
    :dob, :passwordd, :privlege)";

    $hashed_password = password_hash($_POST["User_Password"], PASSWORD_DEFAULT);

    // preparing query fro insertion.
    $result = $connection->prepare($sql);

    $result->execute(array(
        // receive values from input form and inserting them into our db
        ":firstName" => $_POST["User_FirstName"],
        ":lastName" => $_POST["User_LastName"],
        ":addresss" => $_POST["User_Address"],
        ":dob" => $_POST["User_DOB"],
        ":passwordd" => $hashed_password,
        ":privlege" => $_POST["Admin_privelage"],
    ));

    // it will reurn the unique id of the new row.
    echo $connection->lastInsertId();

    ?>
