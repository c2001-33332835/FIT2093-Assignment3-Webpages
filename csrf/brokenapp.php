<html>
  <head>
    <title>Broken App Group</title>
  </head>

  <body>
    <h1>Broken App Group</h1>

    Welcome Broken App group member! You can access group information below, as well as your personal private information.

    <h2>Group Private Information</h2>
    <p>Enter Broken App group password to view our group private information:</p>
    <?php
      $pwd_hash = '$2y$10$qmOUJECfqym5hppt9HR4u.bhAKEHkU9Rv8tYQugetswljuMrsiF5e';
      extract($_GET);
      if (isset($grppwd)) {
        if (password_verify($grppwd,$pwd_hash)) {
          echo "<p>Authentication Verified!</p> <br><br>";
	  echo "<p>Private Broken App Group Info:</p> <br>";
	  $myfile = fopen("groupinfo.txt", "r") or die("Unable to open file!");
	  // Output one line until end-of-file
	  while(!feof($myfile)) {
  		echo fgets($myfile) . "<br>";
	  }
	  fclose($myfile);

        } else {
          echo "<p>Authentication Rejected!</p> <br>";
        }
      }
    ?>
    <form action="#" method="GET">
      <p><input type="password" name="grppwd"></p>
      <p><input type="submit" value="View Group Info"></p>
    </form>

    <h2>Personal Private Information</h2>
    <p>Click <a href="brokenapp-personal.php">here</a> for your peronal info. page. </p>



  </body>
</html>

