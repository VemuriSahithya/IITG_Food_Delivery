<!DOCTYPE html>
<html lang="en" dir="ltr">


<?php
  session_start();

  $s = $_POST['start'];
  $sy = substr($s,0,4);
  $sm = substr($s,5,2);
  $sd = substr($s,8,2);
  echo $sd.$sm.$sy;
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

      echo  " 
        <script>
      alert('  end date should be larger than start date');
       </script>";
       exit();
   }
   
  $conn = new mysqli("localhost", "root", "", "roomdelivery");
  
   if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
   } 


  $sql = "select * from orders ";
  

 ?>
<head>
<title>IITG ROOM DELIVERY SYSTEM</title>
<meta charset="iso-8859-1">
<link rel="stylesheet" href="styles/layout.css" type="text/css">
<style>
table { border-collapse: collapse; width: 100%;}
th, td {text-align: center;padding: 8px;}
tr:nth-child(even) {background-color: #f2f2f2;}
</style>
</head>
<body>
<div class="wrapper row1">
  <header id="header" class="clear">
    <div id="hgroup">
      <h1><a href="#">Myorders</a></h1>
    </div>
    <nav>
      <ul>
      </ul>
    </nav>
    <div class="clear"></div>
  </header>
</div>

<!-- content -->
<div class="wrapper row2">
  <div id="container">
    <!-- content body -->
    <!-- main content -->
    <div id="content" style="width:100%">
      <!-- section 1 -->
      <section>
        <!-- article 1 -->
        <article>
          <h2><a href="">ORDER LIST</a></h2><br/>
          
<?php
$result = $conn->query($sql);
?>
<font<a style="background:none;color:black;text-decoration:underline">
<?php
echo "<table border='1'>
<tr>
<th>order ID</th>
<th>username</th>
<th>tea</th>
<th>coffee</th>
<th>cookie</th>
<th>samosa</th>
<th>puff</th>
<th>paratha</th>
<th>biryani</th>
<th>time ordered</th>
<th>deliverd status</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
   $x=$row['time'];
   $nd=substr($x,9,2);
   $nm=substr($x,12,2);
   $ny=substr($x,15,4);

   if(check($nd,$nm,$ny,$ed,$em,$ey) == 1) continue;
   if(check($nd,$nm,$ny,$sd,$sm,$sy) == 0) continue;
  

  if($row['isdelivered']==0) $status = "YET TO BE DELIVERED";
  else  $status = "delivered";
  $oid = $row['oid']; 
  echo "<tr>";
  echo "<td>" . $row['oid'] . "</td>";
  echo "<td>" . $row['username']. "</td>";
  echo "<td>" . $row['tea'] . "</td>";  
  echo "<td>" . $row['coffee'] . "</td>";
  echo "<td>" . $row['samosa'] . "</td>";
  echo "<td>" . $row['puff'] . "</td>";
  echo "<td>" . $row['samosa'] . "</td>";
  echo "<td>" . $row['paratha'] . "</td>";
  echo "<td>" . $row['biryani'] . "</td>";
  echo "<td>" .$nd ."/" .$nm ."/". $ny. "</td>";
  echo "<td>" .$status. "</td>";

  ?>



<?php
echo "</tr>";
}
echo "</table>";

mysqli_close($conn);
?>

        </article>
    </div>
    <!-- / content body -->
    <div class="clear"></div>
  </div>
</div>
</body>
</html>
