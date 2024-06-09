<html>

  <head>

    <title>Password hasher</title>

  </head>

  <body>

    <p>Enter admin password to hash:</p>

    <?php

      extract($_GET);

      $flag = '';





      if (isset($password)) {



      	$pwd_hash = password_hash($password, PASSWORD_DEFAULT);

      	echo "Password hash:" . $pwd_hash . "\n";

      }

    ?>

    <form action="#" method="GET">

      <p><input type="text" name="password"></p>

      <p><input type="submit" name="submit" value="submit"></p>

    </form>

  </body>

