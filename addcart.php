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
  $result = $conn->query($sql);



        $tea = 0;
        $coffee  = 0 ;
        $cookie = 0;
        $samosa = 0 ;
        $puff = 0;
        $paratha =0 ;
        $biryani = 0;

    while($row = mysqli_fetch_array($result))
    {
        
        $tea = $row['tea'];
        $coffee  = $row['coffee'] ;
        $cookie = $row['cookie'];
        $samosa = $row['samosa'] ;
        $puff = $row['puff'] ;
        $paratha = $row['paratha'] ;
        $biryani = $row['biryani'] ;
     }
?>    
<head>
<title>ADD TO CART</title>
<meta charset="iso-8859-1">
<link rel="stylesheet" href="styles/layout.css" type="text/css">
<style>
table { border-collapse: collapse; width: 100%;}
th, td {text-align: center;padding: 8px;}
/*tr:nth-child(even) {background-color: #f2f2f2;}*/
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
          <li><a href="myorder.php">My Orders</a></li>
          <li>Cart Items</a></li>
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
  <!-- <h2><font color="red">welcome <?php echo $_SESSION["user"]; ?></font></h2><br/><br/> -->
    <div id="content" style="width:100%">
      <!-- section 1 -->
      <section>
        <!-- article 1 -->
        <article>
          <center><h2><a href=""><font color="purple">Add items required to cart</font></a></h2></center><br/>
  

<form action="datacart.php" style="border:0px solid #ccc" method="POST">
        <div class="container">
          <center>
        <label><font color="black"><b>TEA&emsp;&emsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></font></label>
        

        <input type="number"  name="TeaQuantity"  value = "0" min ="0" max= <?php echo $tea; ?>    ><br></br>
        <label><font color="black"><b>COFFEE&emsp;</b></font></label>

        <input type="number"  name="CoffeQuantity" value="0" min ="0" max=<?php echo $coffee; ?>><br></br>
        <label><font color="black"><b>COOKIE&emsp;</b></font></label>
        
        <input type="number"  name="CookieQuantity" value="0" min ="0" max= <?php echo $cookie; ?>><br></br>
        <label><font color="black"><b>SAMOSA&emsp;</b></font></label>
        
        <input type="number"  name="SamosaQuantity" value="0" min ="0" max=<?php echo $samosa; ?>><br></br>
        
        <label><font color="black"><b>PUFF&emsp;&emsp;&nbsp;&nbsp;&nbsp;</b></font></label>
        <input type="number"  name="PuffQuantity" value="0" min ="0" max=<?php echo $puff; ?>><br></br>
        
        <label><font color="black"><b>PARATHA&ensp;</b></font></label>
        <input type="number"  name="ParathaQuantity" value="0" min ="0" max=<?php echo $paratha; ?>><br></br>
        
        <label><font color="black"><b>BIRYANI&emsp;</b></font></label>
        <input type="number"  name="BiryaniQuantity" value="0" min ="0" max=<?php echo $biryani; ?>><br></br>
        <button type="submit" class="addcart">ADD TO CART</button>
        </center>
        </div>
        </div>     
      </form>



    <form action="dataaddcart.php" style="border:0px solid #ccc" method="POST">
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
                <td><b><input type="number"  name="names[]"  value = "0" min ="0" max= <?php echo $row[$ite]; ?> ></b></td> 
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



        </article>
    </div>
    <div class="clear"></div>
  </div>
</div>
</body>
</html>
