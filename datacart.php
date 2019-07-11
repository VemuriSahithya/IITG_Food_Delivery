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
if($tea == "00" && $coffee == "00" && $cookie == "00" && $samosa == "00" && $puff == "00"  & $paratha == "00" & $biryani == "00") 	
{
	echo "select some items";
	exit();
}
$tim = date("H,i,s,d,m,Y");
echo "$tim";
$user = $_SESSION["user"];
$sql = "INSERT INTO orders ( oid, time, isdelivered, tea, coffee, cookie, samosa, puff, paratha, biryani,username)  VALUES (NULL, '$tim', '0','$tea', '$coffee', '$cookie', '$samosa', '$puff', '$paratha', '$biryani','$user')";

if ($conn->query($sql) === TRUE) {
    echo "New record created shuccessfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;;
}

$sql = "select * from stock ";
$result = $conn->query($sql);
$row = mysqli_fetch_array($result);
$tea = $row['tea']-$tea;
$coffee = $row['coffee']-$coffee;
$cookie = $row['cookie']-$cookie;
$samosa = $row['samosa']-$samosa;
$puff = $row['puff']-$puff;
$paratha = $row['paratha']-$paratha;
$biryani = $row['biryani']-$biryani;

$sql = "update stock SET tea ='$tea', coffee= '$coffee' ,  cookie= '$cookie' , samosa= '$samosa' , puff= '$puff' , paratha= '$paratha', biryani= '$biryani' ";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}


$conn->close();
?> 
