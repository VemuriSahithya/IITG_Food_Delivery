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
   $cid =  $_SESSION["cid"];
   $oid =  $_POST['submit'];
  $sql = "select * from orders where  oid = '$oid' ";
  $result = $conn->query($sql);
  $row = mysqli_fetch_array($result);
  $tea = $row['tea']; 
  $coffee  = $row['coffee'];
  $cookie  = $row['cookie'];
  $samosa = $row['samosa'];
  $puff = $row['puff'];
  $paratha = $row['paratha'];
  $biryani = $row['biryani'];

?>



<head>
<title>IITG ROOM DELIVERY SYSTEM</title>

<style>
table { border-collapse: collapse; width: 100%;}
th, td {text-align: center;padding: 8px;border: }
tr:nth-child(even) {background-color: #f2f2f2;}
@media print {
    #printbtn {
        display :  none;
    }
</style>
</head>
<body>
   <h1><center>IITG ROOM DELIVERY SYSTEM</center></h1>
<font size="5"><b><label>Customer ID</label>:-<label><?php echo "$cid" ?></label></b></font><br></br>

<font size="5"><b><label>Name Of The Customer </label>:-<label><?php echo "$user" ?></label></b></font></label><br></br>
<font size="5"><b><label>Order ID </label>:-<label><?php echo "$oid" ?></label></b></font><br></br>

<center><font size="5"><b><label>Ordered Items</label></b></font></center><br></br>
<table>
  <tr>
    <?php if($tea) {?>
      <td><b><font size="4">Tea</b></font> </td>
      <td><b><?php echo "$tea" ?></b></td>
    <?php } ?>
  </tr> 
   <tr>

    <?php if($coffee) {?>
      <td><b><font size="4"> Coffee</font></b></td>
      <td><b><?php echo "$coffee" ?></b></td>
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
      <td><b><font size="4">Samosa</font></b> </td>
      <td><b><?php echo "$samosa" ?></b></td>
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
      <td><b><font size="4">Biryani</font></b> </td>
      <td><b><?php echo "$biryani" ?></b></td>
    <?php } ?>
  </tr> 

   <tr>
   <?php if(1) {?>
      <td><b><font size="4" color="blue">Total Cost</font></b> </td>
      <td><b>1000/-</b></td>
   <?php } ?>
  </tr> 
</table>
<font size="5"><center><b><button type="button" id="printpagebutton" onclick="printpage()"  >Print Invoice</button></b></center></font>
<script type="text/javascript">
    function printpage() {
        //Get the print button and put it into a variable
        var printButton = document.getElementById("printpagebutton");
        //Set the print button visibility to 'hidden' 
        printButton.style.visibility = 'hidden';
        //Print the page content
        window.print()
        //Set the print button to 'visible' again 
        //[Delete this line if you want it to stay hidden after printing]
        printButton.style.visibility = 'visible';
    }
</script>

</body>
</html>
