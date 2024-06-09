<?php
   include('session.php');
   
?>
<html">
   <a href = "logout.php">Sign Out</a>
   <head>
      <title>Committee Member Info Page</title>
   </head>
   
   <body>
      <h2>Welcome, <?php echo $fname; ?>! </h2>
      <img src="alice2.jpeg">
      <br>
      <br>
      Please enter your recent activity date:
      <form action="show.php" method="POST">
	Year: 
	<input type="text" autocomplete="off" name="year"> <br />
	Month:
	<input type="text" AUTOCOMPLETE="off" name="month"><br />
	Event City:
	<input type="text" AUTOCOMPLETE="off" name="city"><br />	
	<br>
	<input type="submit" name="submit" value="submit"><br/>
	<br />
	</form>
	<br>
	<h2> To search committee member's personal profile or update your phone, click <a href="sqli/index.php">here</a></h2>	
   </body>
   
</html>

<?php

 if(isset($_POST["Submit"])){
   
         // session_register("login");
 //  $_SESSION['login_user'] = $login;
        
   //header("location: date.php");
   
   
	$year = htmlspecialchars($_POST['year']);
	$month = $_POST["month"];
	$city = $_POST["city"];
	
	echo "Your event at $city on $month-$year";

}

