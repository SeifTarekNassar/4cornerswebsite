<html>

<head>
    <meta charset= "UTF-8">
    <link rel = "stylesheet" href = "style.css">
    <link href="https://fonts.googleapis.com/css?family=Merienda&display=swap" rel="stylesheet">
</head>
<body>
    
    <form onsubmit="return addData();" class="contact-form">
        <p>
            <input id = "firstName" placeholder="Enter first name" class="contact-form-text" required>
        </p>
        <p>
            <input id = "lastName" placeholder="Enter last name" class="contact-form-text" required>
        </p>
        <p>
            <input id = "address" placeholder="Enter address" class="contact-form-text" required>
        </p>
        <p>
            <input id = "dob" placeholder="Enter dob" class="contact-form-text" required>
        </p>
        <p>
            <input id = "pass" placeholder="Enter password" type = "password" class="contact-form-text" required>
        </p>
        <p>
            <input id = "priv" placeholder="Enter privlege" class="contact-form-text" required>
        </p>

        <input type ="submit" value = "submit" class="contact-form-btn">
    </form>

    <table class = "content-table">
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Address</th>
            <th>Date of birth</th>
            <th>Password</th>
            <th>privelage</th>
        </tr>
        <tbody id="data"></tbody>
    </table>

    <script>	
        var ajax = new XMLHttpRequest();
        ajax.open("GET", "get-data.php", true);
        ajax.send();

        ajax.onreadystatechange = function() {
            if(this.readyState == 4 && this.status == 200) {
                //console.log(this.responseText);
                var data = JSON.parse(this.responseText);

                var html = "";
                for(var a = 0; a < data.length; a++) {
                    html += "<tr data-id='" + data[a].User_ID + "'>";
                        html += "<td>" + data[a].User_ID + "</td>";
                        html += "<td>" + data[a].User_FirstName + "</td>";
                        html += "<td>" + data[a].User_LastName + "</td>";
                        html += "<td>" + data[a].User_Address + "</td>";
                        html += "<td>" + data[a].User_DOB + "</td>";
                        html += "<td>" + data[a].User_Password + "</td>";
                        html += "<td>" + data[a].Admin_privelage + "</td>";
                        html+= "<td><a href = 'edit.php?id=" + data[a].User_ID + "'> Edit </a> </td>"
                        html += "<td> <button id = 'del-btn' onclick='deleteData(\"" + data[a].User_ID + "\")'>Delete</button> </td>"
                    html += "</tr>";
                }
                document.getElementById("data").innerHTML += html;
            } 
        };

        function addData(event) {
        //  console.log("HEYYYYYYYYY")
            //event.preventDefault();
            var firstName = document.getElementById("firstName").value;
            var lastName = document.getElementById("lastName").value;
            var addresss = document.getElementById("address").value;
            var dob = document.getElementById("dob").value;
            var passwordd = document.getElementById("pass").value;
            var privlege = document.getElementById("priv").value;

            var ajax = new XMLHttpRequest();
            ajax.open("POST", "save-data.php", true);
            ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            //passing variables need to be processed by pdo in order to inser data into db
            ajax.send("User_FirstName=" + firstName + "&User_LastName=" + lastName + "&User_Address=" + addresss + "&User_DOB=" + dob + 
            "&User_Password=" + passwordd + "&Admin_privelage=" + privlege);

            ajax.onreadystatechange = function() {
                if(this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);

                    var html = "<tr data-id='" + this.responseText+ "'>";
                        html += "<td>" + this.responseText + "</td>";
                        html += "<td>" + User_FirstName + "</td>";
                        html += "<td>" + User_LastName + "</td>";
                        html += "<td>" + User_Address + "</td>";
                        html += "<td>" + User_DOB + "</td>";
                        html += "<td>" + User_Password + "</td>";
                        html += "<td>" + Admin_privelage + "</td>";
                        html+= "<td><a href = 'edit.php?id=" + this.responseText + "'> Edit </a> </td>"
                        html += "<td> <button id = 'del-btn' onclick='deleteData(\"" + this.responseText + "\")'>Delete</button> </td>"
                    html += "</tr>";

                    document.getElementById("data").innerHTML += html;
                }
            };
            return false;  // to prevent form from submitting
        }

        //document.getElementById("data-add").addEventListener("submit", addData);

        function deleteData(id) {
            if(confirm("Are you sure")) {
                var ajax = new XMLHttpRequest();
                ajax.open("POST", "delete-data.php", true);
                ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                //passing variables need to be processed by pdo in order to inser data into db
                ajax.send("User_ID=" + id );

                ajax.onreadystatechange = function() {
                    if(this.readyState == 4 && this.status == 200) {
                        console.log(this.responseText);

                        // get the tr row using the query selector.
                        document.querySelector("tr[data-id='" + id + "']").remove();
                    }
                };
            }
        }

    </script>

</body>

</html>