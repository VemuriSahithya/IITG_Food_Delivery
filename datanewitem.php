<?php
session_start();
$conn = new mysqli("localhost", "root", "", "roomdelivery");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$real =$_POST['names'];
$item =  $_SESSION['item']; 
$x=-1;
 foreach($real as $val )
   {
	 $x=$x+1;
     $ite=  $item[$x];
     $re = $val+$_SESSION['quantity'][$x];  
     echo $ite;
     echo $re;
    $sql = "update stock SET $ite ='$re' ";
    if ($conn->query($sql) === TRUE) 
    {

    } 
     else
     {
      echo "Error updating record: " . $conn->error;
     }


   }

?>