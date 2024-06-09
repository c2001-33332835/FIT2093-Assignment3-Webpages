<!doctype html>
<html>
<head>
	<title> Welcome To Alice's Fans Club</title>
</head>
<body>

	
	<h2>Committee of Alice's Fans Club ONLY. Login to proceed</h2>
	<img src="alice.jpeg" width="100" height="150">
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


 <h2>To Retrieve Fans Private Document</h2>
    <p>Click <a href="csrf/personal_doc.php">here</a> for their peronal info. page. </p>
    
</body>
</html>

<?php

include("config.php");
   session_start();


if(isset($_POST["submit"])){
   
    $pass = mysqli_real_escape_string($db,$_POST["password"]);
    $pass = MD5($pass);
    $login = mysqli_real_escape_string($db,$_POST["login"]);
    $sql = "SELECT employ_id, last_name, first_name FROM users WHERE username = '$login' and password = '$pass'";
    $result = mysqli_query($db,$sql);
    //$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);
    
    if($count == 1) {
         // session_register("login");
        $_SESSION['login_user'] = $login;
        $_SESSION['city'] = $city;
         header("location: welcome.php");
      }else {
         $error = "Your Login Name or Password is invalid";
         echo $error;
      }
}
?> 


