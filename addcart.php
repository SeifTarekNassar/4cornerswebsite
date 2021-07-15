<?php


$myArray =  $_POST['lol'];
$totalcost = $_COOKIE["totalcost"];
session_start();
$CID =$_SESSION['User_id'];


//testing codes
//Decode the JSON string and convert it into a PHP associative array.
//$decoded = json_encode($user, true);
 $data = fopen("includes/ticket.json", 'w')
        or die("Error opening output file");
    fwrite($data, json_encode($myArray));
//var_dump the array so that we can view it's structure.
var_dump($myArray);
//json_encode($myArray);

$conn= mysqli_connect("localhost","root","","fourcorners");


$sql1="INSERT INTO `orderr`(`ORID`, `CID`, `Totalprice`) VALUES ('NULL','$CID','$totalcost')";
 mysqli_query($conn,$sql1);

$conn2= mysqli_connect("localhost","root","","fourcorners");



$sql2="SELECT ORID, CID, Totalprice FROM orderr WHERE CID = "$CID"";
 mysqli_query($conn2,$sql2);
  $rw= mysqli_fetch_array($sql2);
$OID = $rw[ORID];


foreach($myArray as $arr){

$sql3="INSERT INTO orderdetails (OrderID, MID, quantity) VALUES ('$OID' ,'$arr[id]' ,'$arr[quantity]')";
    mysqli_query($conn,$sql3);
}



?>