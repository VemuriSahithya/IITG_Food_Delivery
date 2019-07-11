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
   $oid =  $_POST["oid"];
  $sql = "select * from addorder where  oid = '$oid' ";
  $result = $conn->query($sql);
  $row = mysqli_fetch_array($result);
$x=0;
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
                    <?php

                        $n=-1;
                        foreach($_SESSION['item'] as $ite)
                        {
                           $n=$n+1;
                           $y=$_SESSION['price'][$n];
                           if($row[$ite])
                           {
                        ?>
                            <tr>
                                  <td><b><font size="4" color="black"><?php echo $ite ?></b></font> </td>
                                  <td><b><font color="black"><?php echo $row[$ite]  ?></b></font></td>
                            </tr> 
                        <?php
                           }
                           $x+=$y*$row[$ite];
                         }
                       ?>
                            <tr>
                                  <td><b><font size="4" color="black">TOATAL</b></font> </td>
                                  <td><b><font color="black"><?php echo $x  ?></b></font></td>
                            </tr> 

                 </table>
                 <br></br>
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
