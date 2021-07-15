<?php
    // for checking the ERRORS if found. 
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $connection = new PDO("mysql:host=localhost;dbname=fourcorners","root","");
    $sql = "UPDATE user SET `User_FirstName` = :firstName, `User_LastName` = :lastName, `User_Address` = :userAddress, `User_DOB` = :dob,
     `User_Password` = :passwordd, `Admin_privelage` = :privlege WHERE `User_ID` = :id"; 

    $hashed_password = password_hash($_POST["User_Password"], PASSWORD_DEFAULT);

    // preparing query fro insertion.
    $result = $connection->prepare($sql);
    $result->execute(array(
        // receive values from input form and inserting them into our db
        ":id" => $_POST["User_ID"],
        ":firstName" => $_POST["User_FirstName"],
        ":lastName" => $_POST["User_LastName"],
        ":userAddress" => $_POST["User_Address"],
        ":dob" => $_POST["User_DOB"],
        ":passwordd" => $hashed_password,
        ":privlege" => $_POST["Admin_privelage"],
    ));

    // recho responsive string
    echo "Done";

    ?>
