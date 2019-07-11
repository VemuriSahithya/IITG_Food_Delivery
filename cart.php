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
	        <li><a href="#">My Orders</a></li>
          <li class="last"><a href="addcart.php">Cart Items</a></li>
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
    <h2><font color="red">welcome <?php echo $_SESSION["user"]; ?></font></h2><br/><br/>
    <div id="content" style="width:100%">
      <!-- section 1 -->
      <section>
        <!-- article 1 -->
        <article>
          <h2><a href="">Items Available</a></h2><br/>
          <!--<table border="1" style="width: 100%;border-collapse: collapse;border: 1px solid black;tr:nth-child(even) {background-color: #f2f2f2;}">
			<tr style="color:black;">
				<th>Item Name</th>
				<th>Description</th>
				<th>Price</th>
				<th></th>
			</tr>
			<tr style="color:black">
				<td>Name</td>
				<td>Address</td>
				<td>Phone Number</td>
				<td><a style="background:none;color:black;text-decoration:underline">Add to Cart</a></td>
			</tr>
			<tr style="color:black">
				<td>Name</td>
				<td>Address</td>
				<td>Phone Number</td>
				<td><a style="background:none;color:black;text-decoration:underline">Add to Cart</a></td>
			</tr>

		  </table>-->
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
