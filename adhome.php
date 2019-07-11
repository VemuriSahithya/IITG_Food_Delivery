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
  $sql = "select * from stock ";

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
      <h1><a href="#">Food Ordering System</a></h1>
    </div>
    <nav>
      <ul>
          <li>Home</a></li> 
	        <li><a href="orders.php">Orders</a></li>
          <li><a href="stocks.php">Stock</a></li>
          <li><a href="sales.php">Sales list</a></li>
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
    <div id="content" style="width:100%">
      <!-- section 1 -->
      <section>
        <!-- article 1 -->
        <article>
          <h2><a href="">Items Available</a></h2><br/>

<?php
$result = $conn->query($sql);
?>
<font<a style="background:none;color:black;text-decoration:underline">
<?php
echo "<table border='1'>
<tr>
<th>tea</th>
<th>coffee</th>
<th>cookie</th>
<th>samosa</th>
<th>puff</th>
<th>paratha</th>
<th>biryani</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
  echo "<td>" . $row['tea'] . "</td>";
  echo "<td>" . $row['coffee'] . "</td>";
  echo "<td>" . $row['samosa'] . "</td>";
  echo "<td>" . $row['puff'] . "</td>";
  echo "<td>" . $row['samosa'] . "</td>";
  echo "<td>" . $row['paratha'] . "</td>";
  echo "<td>" . $row['biryani'] . "</td>";
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
