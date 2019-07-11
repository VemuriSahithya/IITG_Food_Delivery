<?php

$conn = new mysqli("localhost", "root", "", "roomdelivery");
session_start();

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$tea = $_POST['TeaQuantity'];
$coffee = $_POST['CoffeQuantity'];
$cookie = $_POST['CookieQuantity'];
$samosa = $_POST['SamosaQuantity'];
$puff = $_POST['PuffQuantity'];
$paratha = $_POST['ParathaQuantity'];
$biryani = $_POST['BiryaniQuantity'];


$sql = "select * from stock ";
$result = $conn->query($sql);
$row = mysqli_fetch_array($result);
$tea = $row['tea']+$tea;
$coffee = $row['coffee']+$coffee;
$cookie = $row['cookie']+$cookie;
$samosa = $row['samosa']+$samosa;
$puff = $row['puff']+$puff;
$paratha = $row['paratha']+$paratha;
$biryani = $row['biryani']+$biryani;

$sql = "update stock SET tea ='$tea', coffee= '$coffee' ,  cookie= '$cookie' , samosa= '$samosa' , puff= '$puff' , paratha= '$paratha', biryani= '$biryani' ";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}


$conn->close();
?> 
