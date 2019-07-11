<?php

$conn = new mysqli("localhost", "root", "", "roomdelivery");
session_start();

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$item = array();
 $price = array();
 $qunatity = array();
 $_SESSION['item'] = $item;
 $_SESSION['price'] = $price;
 $_SESSION['qunatity'] = $qunatity;


$sql = "select * from newitem ";
$result = $conn->query($sql);


while($row = mysqli_fetch_array($result))
{ 
  $_SESSION['item'][] = $row['itemname'];
  $_SESSION['price'][]  = $row['price']; 
}


$username = $_POST['username'];
$password = $_POST['password'];


if($_POST['type']=="Admin")
{
  if($username == "IITG" && $password == "room" ) { 
   header("location:adhome.php");      }
  else 
  {
      echo  " 
        <script>
      alert('  Enter correct username and password');
       </script>";
    
  }
  exit();
}

$username = stripcslashes($username);
$password = stripcslashes($password);
  
$sql = "select * from customer where username='$username' and password = '$password'";
$result = $conn->query($sql);

if(mysqli_num_rows($result) == 1)
{
    while($row = mysqli_fetch_array($result))
    {
      $_SESSION['user'] = $username;
      $_SESSION['cid']  = $row['cid']; 
    }
   header("location:home.php");      
    exit();
}
else
{
   echo  " 
        <script>
      alert('  Enter correct username and password');
       </script>";
}


$conn->close();
?> 
