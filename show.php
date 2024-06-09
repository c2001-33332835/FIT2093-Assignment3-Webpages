<html>
   <a href = "logout.php">Sign Out</a>
  <br>
   <body>
   <h2>Congratulations!</h2>
This is your recent report of observation.<br>  
<img src="aliceshow.jpeg" alt="Great Show" width="200" height="250">
<br>

<?php

      if(isset($_POST["submit"])){
	$year = htmlspecialchars($_POST['year']);
	$month = $_POST["month"];
	$city = $_POST["city"];
	
	echo "The above show is the event at $city in $month of year $year!"; 
	}
?>
<br>

   </body>
   
</html>

    

