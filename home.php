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
   $count=0;
  $sql = "select * from stock ";

?>
<head>
<title>IITG ROOM DELIVERY SYSTEM</title>
<meta charset="iso-8859-1">
<link rel="stylesheet" href="styles/layout.css" type="text/css">
<style>
table { border-collapse: collapse; width: 100%;}
th, td {text-align: center;padding: 8px;}
tr:nth-child(even) {background-color: #afafaf;}
#A{
   display: none;
}
</style>
<script language="Javascript">

        function hide(x)
        {
            if(x==0)          
            {
               document.getElementById('A').style.display='block';
            }
            else
            {
               document.getElementById('A').style.display='none';
            }
        }

</script>

</head>
<body>
<div class="wrapper row1">
  <header id="header" class="clear">
    <div id="hgroup">
      <h1><a href="#">Food Delivery System</a></h1>
    </div>
    <nav>
      <ul>
          <li>Home</a></li>
	        <li><a href="myorder.php">My Orders</a></li>
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
    <h2><font size="5" color="red">Welcome <?php echo $_SESSION["user"]; ?></font></h2>
    <div id="content" style="width:100%">
      <!-- section 1 -->
      <section>
        <!-- article 1 -->
        <article>
         <center> <h2><a href=""><font size="6" color="purple">&emsp;&nbsp;&nbsp;Items Available</font></a></h2><br/></center><br>


<?php
$result = $conn->query($sql);
?>
<font<a style="background:none;color:black">
<?php

$row = mysqli_fetch_array($result);

  echo "<center>";
  echo "<font size = 5 color=red >";
  echo "<label><b>&emsp;&emsp;&emsp;ITEM  &emsp;&emsp;    QUANTITY  </b></label><br></br>"; 
  echo "</font>";
  echo "<font size = 4 color=blue >";
  echo "<label><b>TEA  &emsp;&emsp;&emsp;&emsp;  </b></label>"; 
  echo "<label><b>" . $row['tea'] . "</b></label><br></br>"; 
  echo "<label><b>COFFEE  &emsp;&emsp;   </b></label>"; 
  echo "<label><b>" . $row['coffee'] . "</b></label><br></br>"; 
  echo "<label><b>SAMOSA  &ensp;&emsp;   </b></label>"; 
  echo "<label><b>" . $row['samosa'] . "</b></label><br></br>"; 
  echo "<label><b>PUFF  &emsp;&emsp;&nbsp;&emsp;   </b></label>"; 
  echo "<label><b>" . $row['puff'] . "</b></label><br></br>"; 
  echo "<label><b>PARATHA  &emsp;   </b></label>"; 
  echo "<label><b>" . $row['paratha'] . "</b></label><br></br>"; 
  echo "<label><b>BIRYANI  &emsp;&ensp;   </b></label>"; 
  echo "<label><b>" . $row['biryani'] . "</b></label><br></br>"; 
  echo "<label><b>COOKIE  &emsp;&emsp;   </b></label>"; 
  echo "<label><b>" . $row['cookie'] . "</b></label><br></br>"; 
  echo "</font>";
echo "</center>";
?>  

<?php
echo "</tr>";
echo "</table>";

mysqli_close($conn);
?>



 <input type="radio" name="sales"  onClick="hide(0)" >Other items show
 <input type="radio" name="sales"  onClick="hide(1)" >hide


 <form action="#" style="border:0px solid #ccc" method="POST" id ="A">
       <div class="container">
        
   <table>
    <tr>  
                <th><b><font size="4" color="black">Name</b></font> </td>
                <th><b><font size="4" color="black">Price</b></font> </td>
                <th><b><font size="4" color="black">no of items</b></font> </td>
              </tr>
     <?php
        $x=-1;
        $_SESSION['quantity']= array();
       foreach($_SESSION['item'] as $ite)
       { 
              $x=$x+1;
               $_SESSION['quantity'][] = $row[$ite] ;
               ?>  
                 <tr>  
                <td><b><font size="4" color="black"><?php echo $ite ?></b></font> </td>
                <td><b><font size="4" color="black"><?php echo $_SESSION['price'][$x] ?></b></font> </td>
                <td><b><font size="4" color="black"><?php echo $row[$ite] ?></b></font> </td>
              </tr>
                <?php
        }
      ?>

    </table>
        </div>     
      </form>
      


        </article>
    </div>
    <!-- / content body -->
    <div class="clear"></div>
  </div>
</div>
</body>
</html>
