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

    <?php
       foreach($_SESSION['item'] as $ite)
       {
          if($row[$ite])
          {
         ?>    
           <tr>
                <td><b><font size="4" color="black"><?php echo $ite ?></b></font> </td>
                  <td><b><font color="black"><?php echo $row[$ite]  ?></b></font></td>
            </tr> 
           <?php
         }
       }
      ?>

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

    <?php
       foreach($_SESSION['item'] as $ite)
       {
          if($row[$ite]<15)
          {
         ?>    

           <tr>
                <td><b><font size="4" color="black"><?php echo $ite ?></b></font> </td>
                <td><b><font color="black"><?php echo $row[$ite]  ?></b></font></td>
            </tr> 
           <?php
         }
       }
      ?>

</table>


<br/></br/>
  <article>
          <h2><a href=""><font size="6" color="green">&emsp;&nbsp;&nbsp;ADD ITEMS</font></a></h2><br/><br>
    <center>
    <form action="datanewitem.php" style="border:0px solid #ccc" method="POST">
        <div class="container">
          <font size="4">
          <table>
  
          <?php
          echo "</tr>";
          echo "</table>";
          $result = $conn->query($sql);
          $row = mysqli_fetch_array($result);
          ?>


   <table>
     <?php

        $_SESSION['quantity']= array();
       foreach($_SESSION['item'] as $ite)
       {
              
               $_SESSION['quantity'][] = $row[$ite] ;
               ?>    
                <td><b><font size="4" color="black"><?php echo $ite ?></b></font> </td>
                <td><b><input type="number"  name="names[]"  value = "0" min ="0" max= <?php echo 100 - $row[$ite]; ?> ></b></td> 
                <?php
        }
      ?>   
    </table>
    <br></br>
         <div class="clearfix">
        <button type="submit" class="signupbtn">Add to stock</button>
        </div>
        </div>     
      </form>


      <form action="addnewitem.php" style="border:0px solid #ccc" method="POST">
        <div class="container">
        <label><b>new item name</b></label>
        <input type="text" placeholder="Name of Item" name="name" required>
        <br></br>
        <label><b>Price</b></label>
        <input type="number" placeholder="Enter Price" value="0" min ="0" max="10000000000" name="price" required>
        <br></br>
        <label><b>Quantity</b></label>
        <input type="number" name = "Quantity" placeholder="No of Item" value="0" min ="0" max="100" name="items" required>

        <div class="clearfix">
        <button type="submit" class="signupbtn">Login</button>
        </div>
        </div>     
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
