<!DOCTYPE html>
<html lang="en" dir="ltr">

<style>
input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

#A {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
 
</style>

<?php
session_start();
?>
<?php
  $conn = new mysqli("localhost", "root", "", "roomdelivery");

   if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
   } 
  $sql = "select * from addorder ";
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
   <!--  <h2><font color="red">Welcome <?php echo $_SESSION["user"]; ?></font></h2><br/><br/> -->
    <div id="content" style="width:100%">
      <!-- section 1 -->
      <section>
        <!-- article 1 -->
        <article>
          <center><h2><a href="">MY ORDERS</a></h2></center><br/><br/></article>
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
<font <a style="background:none;color:black">
<?php



if ($result) {
        while($row = mysqli_fetch_array($result))
        {
              if($row['isdelivered']==0) $status = "YET TO BE DELIVERED";
              else  $status = "delivered";
             ?>

             <form action="changestatusadd.php" id= "A" style="border:0px solid #ccc" method="POST">
             <div class="container">
             <label >OID</label>
             <input type="text"  name = "oid" value="<?php echo $row['oid'] ?>"  readonly>
             <label >Customer name</label>
             <input type="text"  value="<?php echo $row['username'] ?>"  readonly>
             <label >STATUS</label>
             <input type="text"  value="<?php echo $status ?>"  readonly>
                <br></br>
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
                 <br></br>
                <div class="clearfix">
                <button type="submit" class="signupbtn">change status</button>
                </div>
                </div>     
              </form>
            <?php
        }
}
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
