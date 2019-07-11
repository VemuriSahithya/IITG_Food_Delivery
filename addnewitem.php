<?php

$conn = new mysqli("localhost", "root", "", "roomdelivery");
session_start();

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name =$_POST['name'];
$price =$_POST['price'];
$quantity =$_POST['Quantity'];

$added = mysqli_query($conn,"ALTER TABLE stock ADD $name VARCHAR(50) ");
if($added !== FALSE)
{
   echo("The column has been added.");
}
else
{
   echo("This item is alreadyb there.");  
   echo("The column has not been added.");
   exit();
}
$added = mysqli_query($conn,"ALTER TABLE addorder ADD $name INT(11) ");
if($added !== FALSE)
{
   echo("The column has been added.");
}
else
{
   echo("This item is alreadyb there.");  
   echo("The column has not been added.");
   exit();
}

$sql = "update stock SET $name ='$quantity' ";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$sql = "INSERT INTO newitem (Iid,itemname,price) VALUES (NULL,'$name','$price');";


if ($conn->query($sql) === TRUE) {
    echo "New record created shuccessfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;;
}


 $_SESSION['item'][] = $name;
 $_SESSION['price'][]  = $price;

$conn->close();
?> 
