<?php
   include("connection.php");	/*connection to database*/
   session_start(); 		/*to store valid username into session instance*/
	/* SQL Injection works if
	Username input = "valid username"' or '1'='1
	Password input = "valid password"
	*/
	if(isset($_SESSION['locked'])){
		$time_diff = time() - $_SESSION['locked'];
		if($time_diff > 10){
			unset($_SESSION['locked']);
			unset($_SESSION['cooldown_timer']);
		}
	}
	if($_SERVER["REQUEST_METHOD"] == "POST") {
			$myusername = mysqli_real_escape_string($con,$_POST['username']);
			$mypassword = mysqli_real_escape_string($con,$_POST['password']);
			$sql = "SELECT * FROM admin WHERE username = '$myusername'";
			$sql= str_replace("\'","'",$sql);		//to escape blanks and spaces from input
			$result = mysqli_query($con,$sql);		
			$count = mysqli_num_rows($result);
			$username_find_flag=false;
			$password_correct_flag=false;
			$query_result=array();
			while($rows = mysqli_fetch_array($result,MYSQLI_ASSOC)){
						foreach($rows as $row){		
							$query_result[]=$row;
							if(strcmp($row,$myusername)){
							$username_find_flag=true;
							}
							if(password_verify($mypassword,$row)){
							$password_correct_flag=true;
							}
						}
			}
		}

		if($username_find_flag and $password_correct_flag)
			{
				$_SESSION['login_user'] = $myusername;
				//$_SESSION['sql_query'] = $sql; //Just for display
				//$_SESSION['count'] = $count; //Just for display
				//$_SESSION['query_result'] = $query_result; //Just for display
				$_SESSION['shopping_cart'] = array();
				$_SESSION['cooldown_timer'] = 0;
				header("location: welcome.php");
			}else{
				$_SESSION['cooldown_timer'] += 1;
				echo '<script>alert("Wrong username or password!")</script>'; 
				
			}

      // sql injection proof code
/*
      if($count == 1) {
         $_SESSION['login_user'] = $myusername;
			//$_SESSION['sql_query'] = $sql; //Just for display
			//$_SESSION['count'] = $count; //Just for display
			//$_SESSION['query_result'] = $query_result; //Just for display
		 $_SESSION['shopping_cart'] = array();
		 header("location: welcome.php");
      }else {
		echo "wrong username or password!";
      }

*/


	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>

	<style type="text/css">
	
	#text{

		height: 25px;
		border-radius: 5px;
		padding: 4px;
		border: solid thin #aaa;
		width: 100%;
	}

	#button{

		padding: 10px;
		width: 100px;
		color: white;
		background-color: lightblue;
		border: none;
	}

	#box{

		background-color: grey;
		margin: auto;
		width: 300px;
		padding: 20px;
	}

	</style>

	<div id="box">
		
		<form method="POST">
			<div style="font-size: 20px;margin: 10px;color: white;">Login</div>
			<div>
				<label for="username">Username:</label>
				<input id="text" type="text" name="username"><br><br>
			</div>

			<div>

				<label for="password">Password:</label>	
				<input id="text" type="password" name="password"><br><br>
				
			</div>
			<?php if($_SESSION['cooldown_timer'] > 2){
						$_SESSION['locked'] = time();
						echo '<p> Please wait 10 seconds since number of max tries have been reached</p>'; 
					}else{
			?>
			<input id="button" type="submit" value="Login"><br><br>
			<?php
					}
				?>
			<a href="signup.php">Click to Signup</a><br><br>
		</form>
	</div>
</body>
</html>