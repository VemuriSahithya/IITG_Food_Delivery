<!DOCTYPE html>
<html lang="en" dir="ltr">

<?php
session_start();
?>
<?php
  $conn = new mysqli("localhost", "root", "", "roomdelivery");

   if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
   } 
   $user = $_SESSION["user"];
  $sql = "select * from orders where  username = '$user' ";
  function convert($s)
  {
     $h=substr($s,0,2);
     $M=substr($s,3,2);
     $i=substr($s,6,2);
     $d=substr($s,9,2);
     $m=substr($s,12,2);
     $y=substr($s,15,4444);
     $new = $h."::".$M."::".$i."  ;;  ".$d."/".$m."/".$y;
    return $new;
  }

?>
<head>
<title>IITG ROOM DELIVERY SYSTEM</title>
<meta charset="iso-8859-1">
<link rel="stylesheet" href="styles/layout.css" type="text/css">
<style>
table { border-collapse: collapse; width: 100%;}
th, td {text-align: center;padding: 8px;}
tr:nth-child(even) {background-color: #afafaf;}
</style>
</head>
<body>
<div class="wrapper row1">
  <header id="header" class="clear">
    <div id="hgroup">
      <h1><a href="#">Food Delivery System</a></h1>
    </div>
    <nav>
      <ul>

          <li><a href="home.php">Home</a></li>
          <li>My Orders</a></li>
          <li><a href="addcart.php">Cart Items</a></li>
          <li><a href="logout.php">Log Out</a></li>
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
   <!--  <h2><font color="red">Welcome <?php echo $_SESSION["user"]; ?></font></h2><br/><br/> -->
    <div id="content" style="width:100%">
      <!-- section 1 -->
      <section>
        <!-- article 1 -->
        <article>
          <center><h2><a href="">MY ORDERS</a></h2></center><br/><br/></article>

<?php
$result = $conn->query($sql);
?>
<font <a style="background:none;color:black">
<?php
echo "<table border='1'>
<tr>
<th>Order ID</th>
<th>Tea</th>
<th>Coffee</th>
<th>Cookie</th>
<th>Samosa</th>
<th>Puff</th>
<th>Paratha</th>
<th>Biryani</th>
<th>Time Ordered/Time delivered</th>
<th>Deliverd Status</th>
<th>Print Invoice </th>
</tr>";


if ($result) {
    while($row = mysqli_fetch_array($result))
    {

      if($row['isdelivered']==0)  $status = "YET TO BE DELIVERED";
      else  $status = "delivered";
      $time = convert($row['time']);
      echo "<tr>";
      echo "<td>" . $row['oid'] . "</td>";
      echo "<td>" . $row['tea'] . "</td>";
      echo "<td>" . $row['coffee'] . "</td>";
      echo "<td>" . $row['cookie'] . "</td>";
      echo "<td>" . $row['samosa'] . "</td>";
      echo "<td>" . $row['puff'] . "</td>";
      echo "<td>" . $row['paratha'] . "</td>";
      echo "<td>" . $row['biryani'] . "</td>";
      echo "<td>" .$time."</td>";
      echo "<td>" .$status. "</td>";
      ?>

<form action="invoice.php" method="post">
<td><button type="submit" name="submit" value= <?php echo $row['oid'] ?>   >invoice</button></td> 
</form>

      

    <?php
    echo "</tr>";
    }
}
echo "</table>";
mysqli_close($conn);

?>

       <form action="otherorders.php" method="post">
       <button type="submit" name="submit" value= "really" >Other orders</button> 
       </form>
        </article>
    </div>
    <!-- / content body -->
    <div class="clear"></div>
  </div>
</div>
</body>
</html>
