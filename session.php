<?php
   include('connection.php');
   session_start();  
   $user_check = $_SESSION['login_user'];
   $ses_sql = mysqli_query($con,"select * from admin where username = '$user_check' ");
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   $login_session = $row['username'];
   $adress_session = $row['adress'];
   //$_SESSION['cooldown_timer'] = 0; 

   //Double checks that we only get one user from the sql query
   /*if(empty($login_session)){
      echo '<script>alert("Unvalid username input")</script>';
		echo '<script>window.location="index.php"</script>'; 
   }*/
   if(!isset($_SESSION['login_user'])){
      header("location:index.php");
      die();
   }
?>
