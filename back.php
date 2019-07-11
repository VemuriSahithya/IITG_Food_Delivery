
<?php
  session_start();

  $s = $_POST['start'];
  $sy = substr($s,0,4);
  $sm = substr($s,5,2);
  $sd = substr($s,8,2);

  $e = $_POST['end'];
  $ey = substr($e,0,4);
  $em = substr($e,5,2);
  $ed = substr($e,8,2);
  function check($a,$b,$c,$A,$B,$C)
  {
    if($c<$C) return 0;
    else if($c>$C) return 1; 
    if($b<$B) return 0;
    else if($b>$B) return 1;
    if($a<$A) return 0;
    else if($a>$A) return 1;
    return 2;
  }
  $x =check($sd,$sm,$sy,$ed,$em,$sy);
   if($x==1) 
   {
       alert("end date should be greater  than  start date");
       exit();
   }
   
  $conn = new mysqli("localhost", "root", "", "roomdelivery");
  
   if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
   } 


  $sql = "select * from orders ";
  

 ?>