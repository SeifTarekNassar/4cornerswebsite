<?php
    // in order to edit first we need to get the data using the unique id, so we can populate it in form
    // we need to show the old values first of the selected row.

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $connection = new PDO("mysql:host=localhost;dbname=fourcorners","root","");

    //get the id from the url
    $id = isset($_GET['id']) ? $_GET['id'] : '';    

    $sql = "SELECT * FROM user WHERE User_ID = :id";

    $result = $connection->prepare($sql);

    $result->execute(array(
        ":id" => $id
    ));

    // calling fetch func to just return one row
    $data = $result->fetch();
    //echo 'hello world' . $id; 
    //print_r($data); // displaying it to see if we are getting correct values.

?>

<html>

<head>
    <link rel = "stylesheet" href = "style.css">
</head>
<body>
    <form onsubmit="return editData();">
    <input type = "hidden" id = "id" value = "<?= $id; ?>">
        <p>
            <input id = "firstName" placeholder="Enter first name" value = "<?= $data["User_FirstName"]; ?>">
        </p>
        <p>
            <input id = "lastName" placeholder="Enter last name" value = "<?= $data["User_LastName"]; ?>"> 
        </p>
        <p>
            <input id = "address" placeholder="Enter address" value = "<?= $data["User_Address"]; ?>">
        </p>
        <p>
            <input id = "dob" placeholder="Enter dob" value = "<?= $data["User_DOB"]; ?> ">
        </p>
        <p>
            <input id = "pass" placeholder="Enter password" type = "password" value = "<?= $data["User_Password"]; ?>">
        </p>
        <p>
            <input id = "priv" placeholder="Enter privlege" value = "<?= $data["Admin_privelage"]; ?>">
        </p>

        <input type ="submit" value = "submit">
    </form>

    <script>	
        function editData() {
        //  console.log("HEYYYYYYYYY")
            //event.preventDefault();

            var id = document.getElementById("id").value;  
            var firstName = document.getElementById("firstName").value;
            var lastName = document.getElementById("lastName").value;
            var addresss = document.getElementById("address").value;
            var dob = document.getElementById("dob").value;
            var passwordd = document.getElementById("pass").value;
            var privlege = document.getElementById("priv").value;

            var ajax = new XMLHttpRequest();
            ajax.open("POST", "edit-data.php", true);
            ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            //passing variables need to be processed by pdo in order to inser data into db
            ajax.send("User_ID=" + id + "&User_FirstName=" + firstName + "&User_LastName=" + lastName + "&User_Address=" + addresss + "&User_DOB=" + dob + 
            "&User_Password=" + passwordd + "&Admin_privelage=" + privlege);

            ajax.onreadystatechange = function() {
                if(this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);
                }
            };
            return false;  // to prevent form from submitting
        }

        //document.getElementById("data-add").addEventListener("submit", addData);

    </script>
</body>

</html>