<?php


      // define user pwd hash array
      $pwd_hash = array();
      $pwd_hash[3] = '$2y$10$dGcQzEHBUxaDiPetlx2eB.Y2WOnFK1JRB4jZ8sSgzygWS5WuY.t.u';
      $pwd_hash[4] = '$2y$10$Xfa0FR8XAvVbQ01I3fclZOPmJTGKJuVpJw8KnTaBD1DUCtvvddNYS';
      $member[3]="Grace";
      $member[4]="Camy";

      // extract the user id and password from input and verify
       // if verified, give extra form for entering document ID number for that user to be viewed, set authenticated_flag = true
	// extra form has hidden inputs: session_ID (random) and user_ID (from above).
	// php script checks session ID and auth. flag, and if so, acceses files user_ID(suppled by hidden input - this is broken 		//	auth. vuln. - should be using the user ID that was authenticated)
   if (isset($_POST["indpwd"])) {
      $indpwd = $_POST["indpwd"];
      $ID = $_POST["ID"];
      $auth_flag="0";
      session_start();
      $_SESSION['indpwd']=$indpwd;
      $_SESSION['ID'] = $ID;
      $_SESSION['auth_flag']=$auth_flag;



      if (isset($indpwd) && ($ID > "2") && ($ID < "5")) {
        if (password_verify($indpwd,$pwd_hash[$ID])) {
	  $auth_flag = "1";
	  $bytes = openssl_random_pseudo_bytes(128);
    	  $sessID   = bin2hex($bytes);
	  echo "<h2>Hello, " . $member[$ID] . " !</h2>";
    	  echo "<p>Please enter your private document ID number to view it:</p>";
          echo '<form method="POST">';
          echo '<p>Doc ID: <input type="text" name="DocID"></p>';
	  echo '<p><input type="hidden" name="psID" value="' . session_id() . '"></p>';
 	  echo '<p><input type="hidden" name="uIDrx" value="' . $ID . '"></p>';
 	  echo '<p><input type="hidden" name="sIDrx" value="' . $sessID . '"></p>';
      	  echo '<p><input type="submit" value="View Document"></p>';
    	  echo "</form>";
	  echo '<form method="POST">';
	  echo '<p><input type="hidden" name="Logoutflag" value=' . '1' . '"></p>';
	  echo '<p><input type="hidden" name="psID" value="' . session_id() . '"></p>';
 	  echo '<p><input type="hidden" name="userIDrx" value="' . $ID . '"></p>';
 	  echo '<p><input type="hidden" name="sessIDrx" value="' . $sessID . '"></p>';
      	  echo '<p><input type="submit" value="Logout"></p>';
    	  echo "</form>";

	  $_SESSION['indpwd']=$indpwd;
      	  $_SESSION['ID'] = $ID;
      	  $_SESSION['auth_flag']=$auth_flag;
          $_SESSION['sessID']=$sessID;


        } else {
          echo "<p>Authentication Failed!</p> <br>";
        }
      }
   }

   if (isset($_POST["DocID"])) {
		session_start();
	  	$DocID = $_POST["DocID"];
	  	$uIDrx = $_POST["uIDrx"];
	  	$sIDrx = $_POST["sIDrx"];


	  	if (isset($DocID) && ($uIDrx > "2") && ($uIDrx < "5") && ($sIDrx == $_SESSION['sessID']) && ($_SESSION['auth_flag'] == "1")) {
	//	echo '<p> DocID= ' . $DocID . '</p>';
	//	echo '<p> uIDrx= ' . $uIDrx . '</p>';
	//	echo '<p> sIDrx= ' . $sIDrx . '</p>';
		
			echo '<form method="POST">';
			echo '<p><input type="hidden" name="Logoutflag" value="' . '1' . '"></p>';
 	  	        echo '<p><input type="hidden" name="uIDrx" value="' . $uIDrx . '"></p>';
 	  		echo '<p><input type="hidden" name="sIDrx" value="' . $sIDrx . '"></p>';
      	  		echo '<p><input type="submit" value="Logout"></p>';
    	  		echo "</form>";

		
			if (($DocID > "0") && ($DocID < "3")) {
				echo '<p><h2> Contents of Document </h2></p>';
				echo '<p><h3> Member Name: ' . $member[$uIDrx] . ', Private Document ID: ' . $DocID . ':</h3></p>';
				$fname  = "userID_" . $uIDrx . 'DocID_' . $DocID . '.txt';
	  			$myfile = fopen($fname, "r") or die("Unable to open file!");
	  			// Output one line until end-of-file
	  			while(!feof($myfile)) {
  					echo fgets($myfile) . "<br>";
	  			}
	  			fclose($myfile);
			}
	  	}



   }

   if (isset($_POST["Logoutflag"])) {
		session_start();
	  	$Logoutflag = $_POST["Logoutflag"];
	  	$uIDrx = $_POST["uIDrx"];
	  	$sIDrx = $_POST["sIDrx"];

	  	if (($Logoutflag == '1') && ($uIDrx > "2") && ($uIDrx < "5") && ($sIDrx == $_SESSION['sessID']) && ($_SESSION['auth_flag'] == "1")) {
			echo '<p><h3> Thanks, you have logged out! Return to <a href="../index.php">home</a> </h3></p>';
			session_destroy();
   		}
   }



if ( !(isset($_POST["Logoutflag"])) && !(isset($_POST["DocID"])) && !(isset($_POST["indpwd"])) )
{
echo '<html>';
echo '  <head>';
echo '    <title>Alice Fans Club Member Portal</title>';
echo '  </head>';

echo '  <body>';
echo '    <h2>Hey, fans!</h2>';

echo '    Here, you can access your safely stored personal private information.';

echo '    <p>Enter your Fans Club membership number and member password:</p>';
echo '    <form method="POST">';
echo '      <p>Member ID Number: <input type="text" name="ID"></p>';
echo '     <p>Member password: <input type="password" name="indpwd"></p>';
echo '      <p><input type="submit" value="Log in"></p>	';
echo '    </form>';
echo '   </body>';

echo '</html>';
}
?>
