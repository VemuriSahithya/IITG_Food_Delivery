<!DOCTYPE html>
<html lang="en" dir="ltr">

<?php
session_start();
?>
<head>
<title>IITG ROOM DELIVERY SYSTEM</title>
<meta charset="iso-8859-1">
<link rel="stylesheet" href="styles/layout.css" type="text/css">
<style>
table { border-collapse: collapse; width: 100%;}
th, td {text-align: center;padding: 8px;}
tr:nth-child(even) {background-color: #afafaf;}
#A,#B,#C
{
  display: none;
}
</style>
<script language="Javascript">
        function hide(x)
        {
            if(x==0)          
            {
                document.getElementById('A').style.display='block';
                document.getElementById('B').style.display='none';
                document.getElementById('C').style.display='none';

            }
             else if(x==1)
            {
                document.getElementById('A').style.display='none';
                document.getElementById('B').style.display='block';
                document.getElementById('C').style.display='none';
                
            }
            else
            {

                document.getElementById('A').style.display='none';
                document.getElementById('B').style.display='none';
                document.getElementById('C').style.display='block';
                

            }
           return ;  
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
          <li><a href="adhome.php">Home</a></li> 
          <li><a href="orders.php">Orders</a></li>
          <li><a href="stocks.php">Stock</a></li>
          <li>Sales list</a></li>
          <li><a href="logout.php">Log Out</a></li>
      </ul>
    </nav>
    <div class="clear"></div>
  </header>
</div>

<!-- content --> 
    <!-- content body -->
    <!-- main content -->
    <h2><font size="5" color="red">Select time and date </font></h2>
    <div id="content" style="width:100%">
      <!-- section 1 -->
      <section>
        <!-- article 1 -->
        <article>   


			  <div class="container"> 
                  <input type="radio" name="sales"  onClick="hide(0)" required>By date
                  <input type="radio" name="sales"  onClick="hide(1)" required>By Month
                  <input type="radio" name="sales"  onClick="hide(2)" required>Daily
			  </div>     


      <form action="date.php" style="border:0px solid #ccc" id= "A" method="POST">
        <div class="container">
        <label><b>start date</b></label>
        <input type="date" id="myDate" name="start" required>
        <br></br>
        <label><b>end date</b></label>
        <input type="date" id="myDate" name="end" required>
        <br></br>
        <button type="submit" >Go</button>
        </div>
        </div>
      </form>


      <form action="month.php" style="border:0px solid #ccc" id = "B" method="POST">
        <div class="container">
        <label><b>YEAR</b></label>
        <input type="number" name= "year" min="1900" max="2019" step="1" value="2019" required>
        <br></br>
        <label><b>MONTH</b></label> 
        <input type="number"  name = "month" min="1" max="12" step="1" value="1" required >
        <br></br>
        <button type="submit" >Go</button>
        </div>
        </div>
      </form>


      <form action="daily.php" style="border:0px solid #ccc"  id = "C" method="POST">
        <div class="container">
        <label><b>DAIlY</b></label>
        <br></br>
         <button type="submit" >Go</button>
        </div>
        </div>
      </form>


        </article>
    </div>
    
</body>
</html>
