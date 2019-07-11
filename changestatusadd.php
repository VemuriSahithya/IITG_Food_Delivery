<?php
$conn = new mysqli("localhost", "root", "", "roomdelivery");
session_start();

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$oid = $_POST['oid'];
$sql = "update addorder SET isdelivered = '1' where oid ='$oid' ";


if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

   header("location:otheradminorders.php");      
   exit();

?>