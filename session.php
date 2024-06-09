<?php
   include('config.php');
   session_start();
   
   $user_check = $_SESSION['login_user'];
   $city = $_SESSION['city'];
      
   $ses_sql = mysqli_query($db,"select last_name, first_name, username from users where username = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['username'];
   $lname = $row['last_name'];
   $fname = $row['first_name'];

   
   if(!isset($_SESSION['login_user'])){
      header("location:index.php");
      die();
   }
?>
