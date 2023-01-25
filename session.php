<?php
   include('config.php');

   if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
  }
  echo "Connected successfully";
   session_start();
   


   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($con,"select name from masterusers where name = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql);
   
   $login_session = $row['name'];
   
   if(!isset($_SESSION['login_user'])){
      header("location:index.php");
      die();
   }
?>