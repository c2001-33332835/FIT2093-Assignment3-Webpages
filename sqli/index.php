<?php

include('../session.php');
$login=$_SESSION['login_user'];

?>

<!doctype html>
<html>
<head>
	<title> Member information</title>
</head>
<body>

	<h3> Hello, <?php echo $fname;?>! You can search other member's information or update your phone no.</h3>
	<form action="" method="POST">
	In this query, a member's profile can be extracted. <br/>
	Please enter a username: <br />
	<input type="name" autocomplete="off" name="id"> <br />
	<br />
	<input type="submit" value="submit" name="submit"><br />
	<br />
	</form>
	<br />
	
<?php
if( isset( $_POST[ 'submit' ] ) ) {
	// Get input
	$id = $_POST[ 'id' ];

	
//	$id = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $id);
		
	$query  = "SELECT title, salary, phone_no FROM users WHERE username = '$id';";

        $result = mysqli_query($db,$query) or die( '<pre>Error </pre>' );
   	  
	// Get results
	while( $row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
		// Display values
		//$first = $row["first_name"];
		//$last  = $row["last_name"];
		$title=$row["title"];
		$salary = $row["salary"];
		$phone = $row["phone_no"];
			// Feedback for end user
		echo "<pre>ID: {$id} <br />Title: {$title}<br />Salary: {$salary} <br />Phone No.: {$phone}</pre>";
	}
	//echo $html;
}

?>

	<form action="" method="POST">
	In this form, you can update your phone no., <?php echo $fname ?>! <br />
	Please enter your new phone no.:<br/>
	<input type="phone" autocomplete="off" name="phone"> <br />
	<br />
	<input type="submit" value="update" name="update"><br />
	<br />
	</form>

</body>
</html>



<?php
//mysqli_close($GLOBALS["___mysqli_ston"]);

if( isset( $_POST[ 'update' ] ) ) {
	// Get input
	$phone = $_POST['phone'];
	
		
	$query  = "UPDATE users SET phone_no = '$phone' where username = '$login';";
	if (mysqli_query($db,$query)){
        	echo "Records are updated successfully";
        }
        else{
        	echo "ERROR: Failed to execute $query".mysqli_error($db);
        }
}	
?>
