<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<title>IITG ROOM DELIVERY</title>
<meta charset="iso-8859-1">
<link rel="stylesheet" href="styles/layout.css" type="text/css">
<link rel="stylesheet" href="styles/registration.css" type="text/css">
<style>
table { border-collapse: collapse; width: 100%;}
th, td {text-align: left;padding: 8px;}
tr:nth-child(even) {background-color: #f2f2f2;}
</style>
</head>
<body>
<div class="wrapper row1">
  <header id="header" class="clear">
    <div id="hgroup">
      <h1><a href="#">IITG ROOM DELIVERY</a></h1>
    </div>
    <div class="clear"></div>
  </header>
</div>
<!-- content -->
<div class="wrapper row2">
  <div id="container">
    <!-- content body -->
    <aside id="left_column">
      <section>
        <!-- article 1 -->
        <article>
          <h2>Login Form</h2>
			<form action="login.php" style="border:0px solid #ccc" method="POST">
			  <div class="container">
				<label><b>username</b></label>
				<input type="text" placeholder="Enter username" name="username" required>

				<label><b>password</b></label>
				<input type="password" placeholder="Enter Password" id="password" name="password" required>
			<!-- 	<input type="checkbox" name = "showpassword" onchange="SHpassword();"  > showpassword -->
        <input type="checkbox" onclick="myFunction()">Show Password
          <script>
            function myFunction() {
             var x = document.getElementById("password");
             if (x.type == "password") {
             x.type = "text";
             } else {
              x.type = "password";
              }
            }
            </script>

   
        <br></br> 
       <input type="radio" name="type" value="Admin" required>Admin
       <input type="radio" name="type"  value="SF"  required>Student/Faculty

       
				<div class="clearfix">
				<button type="submit" class="signupbtn">Login</button>
				<button type="button" class="cancelbtn"><a href="Creg.html" style="background:none;color:white">Register</a></button>
				</div>
			  </div>     
			</form>
        </article>
		</section>
    </aside>
   
    <!-- / content body -->
    <div class="clear"></div>
  </div>
</div>
<!-- <script>
  function SHpassword()
  {
    var chkbx = x.checked;
    if(chkbx)
    {
      echo "rakesh lokesjsasfsd";
       document.getElementById("password").type="text";
    }
    else
    {
           document.getElementById("password").type="text";
    }
  }
</script> -->

</body>
</html>
