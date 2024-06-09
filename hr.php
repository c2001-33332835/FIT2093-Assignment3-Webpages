<!doctype html>
<html>
<head>
	<title> This is HR page </title>
</head>
<body>
	<h2> A query of the society member by login name.</h2>
	<br \>
	<form action="" method="POST">
	Username: <br />
	<input type="name" autocomplete="off" name="login"> <br />
	<br \>
	<input type="submit" value="submit" name="submit"><br />
	<br />
	</form>

</body>
</html>

<?php
include('config.php');

if(isset($_POST['submit'])){
   
   $username = $_POST['login'];

    $sql = "SELECT username, last_name, first_name, salary FROM users WHERE username= '$username'";
    
    $result = mysqli_query($db,$sql);
    //$row = mysqli_fetch_array(sql,MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);
    echo "<br/>No. of results: ".$count;
    
    if($count>=1){
    	echo "<table>";
	    while($count >= 1) {
	    	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	    	$username = $row['username'];
	    	$fname = $row['first_name'];
	    	$lname = $row['last_name'];
	    	$salary = $row['salary'];
	    	echo "<tr><td>User Name: </td><td>".$username."</td>";
	    	echo "<tr><td>Last Name: </td><td>".$lname."</td>";
	    	echo "<tr><td>First Name: </td><td>".$fname."</td>";
	    	echo "<tr><td>Salary: </td><td>".$salary."</td>";
	    	//echo "<h2>" . $username . "</h2>";
	    	//<br />First name: {$fname}<br />Surname: {$lname}<br /> Salary: {$salary}</pre>";
	    	
	    	$count = $count -1;
	    }
	echo "</table>";
    mysqli_free_result($result);
    mysqli_close($db);
    }
}
?> 

