<?php

$conn = new mysqli("localhost", "root", "", "roomdelivery");
session_start();

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = $_POST['username'];
$password = $_POST['psw'];
$rpt = $_POST['psw-repeat'];

    

$username = stripcslashes($username);
$password = stripcslashes($password);


$sql = "select * from customer where username='$username' ";
$result = $conn->query($sql);

if($password != $rpt)      
{

      echo  " 
        <script>
      alert('  password not  maching');
       </script>";
       exit();
}
if(mysqli_num_rows($result) != 0)
{
   
      echo  " 
        <script>
      alert('  username already taken');
       </script>";
       exit();
}

$sql = "INSERT INTO customer ( cid, username,password )  VALUES (NULL, '$username', '$password')"; 
$result = $conn->query($sql);



if ($result == TRUE) {
    
   
      echo  " 
        <script>
      alert(' sucessfully registered');
       </script>";

 } else {
     echo "Error: " . $sql . "<br>" . $conn->error;;
     exit();
 }
 $conn->close();
 //header("location:index.php");
?> 
