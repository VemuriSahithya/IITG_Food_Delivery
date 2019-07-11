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
     $re = $_SESSION['quantity'][$x]-$val;  
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

$tim = date("H,i,s,d,m,Y");
echo "$tim";
$user = $_SESSION["user"];
$sql = "INSERT INTO addorder ( oid, time, isdelivered,username)  VALUES (NULL, '$tim', '0','$user')";

if ($conn->query($sql) === TRUE) {
    echo "New record created shuccessfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;;
}


    $sql = "SELECT MAX(oid) AS maximum FROM addorder";
    $result = $conn->query($sql);


        $row = mysqli_fetch_array($result);
        $largestNumber = $row['maximum'];
        echo $largestNumber; 



$x=-1;
 foreach($real as $val )
   {
      $x=$x+1;
      $ite=  $item[$x]; 
      echo $ite;
      echo $val;
      $sql = "update addorder SET $ite ='$val' where oid = '$largestNumber' ";
      if ($conn->query($sql) === TRUE) 
      { 

      } 
       else
      {
       echo "Error updating record: " . $conn->error;
      }


   }



?>