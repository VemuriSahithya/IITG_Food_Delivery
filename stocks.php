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
  .button{background-color: #4CAF50;color: white;}
table { border-collapse: collapse; width: 100%;}
th, td {text-align: center;padding: 8px;}
tr:nth-child(odd) {background-color: #a8e063;}
tr:nth-child(even) {background-color: #56ab2f;}
tr:nth-child(odd) {color: #000000;}
tr:nth-child(even) {color: #FFFFFF;}

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
        <li><a href="adhome.php">Home</a></li> 
          <li><a href="orders.php">Orders</a></li>
          <li>Stock</a></li>
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
   <!--  <h2><font size="7" color="red"> Stocks</font></h2> -->
    <div id="content" style="width:100%">
      <!-- section 1 -->
      <section>
        <!-- article 1 -->
        <article>
          <h2><a href=""><font size="6" color="green">&emsp;&nbsp;&nbsp;Items Available</font></a></h2><br/><br>
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
<font<a style="background:none;color:black">
<?php

$row = mysqli_fetch_array($result);
$tea = $row['tea']; 
  $coffee  = $row['coffee'];
  $cookie  = $row['cookie'];
  $samosa = $row['samosa'];
  $puff = $row['puff'];
  $paratha = $row['paratha'];
  $biryani = $row['biryani'];
?>
<table>
  <tr>
    <?php if($tea) {?>
      <td><b><font size="4" color="black">Tea</b></font> </td>
      <td><b><font color="black"><?php echo "$tea" ?></b></font></td>
    <?php } ?>
  </tr> 
   <tr>

    <?php if($coffee) {?>
      <td><b><font size="4" color="white"> Coffee</font></b></td>
      <td><b><font color="white"><?php echo "$coffee" ?></font></b></td>
    <?php } ?>
  </tr> 
   <tr>
    <?php if($cookie) {?>
      <td><b><font size="4">Cookie</font></b> </td>
      <td><b><?php echo "$cookie" ?></b></td>
    <?php } ?>
  </tr>

   <tr>
    <?php if($samosa) {?>
      <td><b><font size="4" color="white">Samosa</font></b> </td>
      <td><b><font color="white"><?php echo "$samosa" ?></font></b></td>
    <?php } ?>
  </tr>

   <tr>
    <?php if($paratha) {?>
      <td><b><font size="4">Paratha</font></b> </td>
      <td><b><?php echo "$paratha" ?></b></td>
    <?php } ?>
  </tr>

   <tr>
    <?php if($biryani) {?>
      <td><b><font size="4" color="white">Biryani</font></b> </td>
      <td><b><font color="white"><?php echo "$biryani" ?></font></b></td>
    <?php } ?>
  </tr> 

   <tr>
   <?php if(1) {?>
      <td><b><font size="4" color="black">Total Cost</font></b> </td>
      <td><b>1000/-</b></td>
   <?php } ?>
  </tr> 
</table>


<?php
echo "</tr>";
echo "</table>";
$result = $conn->query($sql);
$row = mysqli_fetch_array($result);

 
  ?>  
  <br/></br/>
  <article>
          <h2><a href=""><font size="6" color="green">&emsp;&nbsp;&nbsp;Purchase List</font></a></h2><br/><br>
  <table>
  <tr>
    <?php if($tea<10) {?>
      <td><b><font size="4">Tea</b></font> </td>
      <td><b><?php echo "$tea" ?></b></td>
    <?php } ?>
  </tr> 
   <tr>

    <?php if($coffee<10) {?>
      <td><b><font size="4"> Coffee</font></b></td>
      <td><b><?php echo "$coffee" ?></b></td>
    <?php } ?>
  </tr> 
   <tr>
    <?php if($cookie<10) {?>
      <td><b><font size="4">Cookie</font></b> </td>
      <td><b><?php echo "$cookie" ?></b></td>
    <?php } ?>
  </tr>

   <tr>
    <?php if($samosa<10) {?>
      <td><b><font size="4">Samosa</font></b> </td>
      <td><b><?php echo "$samosa" ?></b></td>
    <?php } ?>
  </tr>

   <tr>
    <?php if($paratha<10) {?>
      <td><b><font size="4">Paratha</font></b> </td>
      <td><b><?php echo "$paratha" ?></b></td>
    <?php } ?>
  </tr>

   <tr>
    <?php if($biryani<10) {?>
      <td><b><font size="4">Biryani</font></b> </td>
      <td><b><?php echo "$biryani" ?></b></td>
    <?php } ?>
  </tr> 

    
</table>

<br/></br/>
  <article>
          <h2><a href=""><font size="6" color="green">&emsp;&nbsp;&nbsp;ADD ITEMS</font></a></h2><br/><br>
    <center>
    <form action="additem.php" style="border:0px solid #ccc" method="POST">
        <div class="container">
          <font size="4">
          <label><font color="black"><b>TEA&emsp;&emsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></font></label>
        

        <input type="number"  name="TeaQuantity"  value = "0" min ="0" max= <?php echo 100 - $tea; ?>    ><br></br>
        <label><font color="black"><b>COFFEE&emsp;</b></font></label>

        <input type="number"  name="CoffeQuantity" value="0" min ="0" max=<?php echo 100 - $coffee; ?>><br></br>
        <label><font color="black"><b>COOKIE&emsp;</b></font></label>
        
        <input type="number"  name="CookieQuantity" value="0" min ="0" max= <?php echo 100 - $cookie; ?>><br></br>
        <label><font color="black"><b>SAMOSA&emsp;</b></font></label>
        
        <input type="number"  name="SamosaQuantity" value="0" min ="0" max=<?php echo 100 - $samosa; ?>><br></br>
        
        <label><font color="black"><b>PUFF&emsp;&emsp;&nbsp;&nbsp;&nbsp;</b></font></label>
        <input type="number"  name="PuffQuantity" value="0" min ="0" max=<?php echo 100 - $puff; ?>><br></br>
        
        <label><font color="black"><b>PARATHA&ensp;</b></font></label>
        <input type="number"  name="ParathaQuantity" value="0" min ="0" max=<?php echo 100 - $paratha; ?>><br></br>
        
        <label><font color="black"><b>BIRYANI&emsp;</b></font></label>
        <input type="number"  name="BiryaniQuantity" value="0" min ="0" max=<?php echo 100 - $biryani; ?>><br></br>
        <button type="submit" class="button">ADD ITEMS</button>
        
 -->    </font>
        </div>
        </div>     
      </form>
      </center>


       <form action="newitems.php" method="post">
       <button type="submit" name="submit" value= "really" >additional items</button> 
       </form>

<?php
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
