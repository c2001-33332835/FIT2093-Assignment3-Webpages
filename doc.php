<?php
   include('session.php');
?>
<html">
   <a href = "logout.php">Sign Out</a>
   <head>
      <title>Member Document Access Site</title>
   </head>
   
   <body>
      <h2>Welcome, <?php echo $fname; ?>! Please enter your join date</h2>
      <form action="" method="POST">
	Your Login Name: <br />
	<input type="name" autocomplete="off" name="login"> <br />
	Password: <br />
	<input type="password" AUTOCOMPLETE="off" name="password"><br />
	City: <br />
	<input type="city" AUTOCOMPLETE="off" name="city"><br />
	<input type="submit" value="submit" name="submit"><br />
	<br />
	</form>
   </body>
   
</html>

<?php
if(isset($_POST["submit"])){
   
         // session_register("login");
 //  $_SESSION['login_user'] = $login;
        
   //header("location: date.php");
   
   
	$year = htmlspecialchars($_POST['year']);
	$month = $_POST["month"];
	$day = $_POST["day"];
	
	echo "Your join date is $day-$month-$year";
}

