<?php 
session_start();

	include("connection.php");


	if($_SERVER['REQUEST_METHOD'] == "POST"){
		//something was posted
		$username = $_POST['username'];
		$password =$_POST['password'];
		$hashed_password = password_hash($password, PASSWORD_DEFAULT);
		$homeadress = $_POST['homeadress'];
        $query = "INSERT INTO admin (username,password,adress) VALUES ('$username','$hashed_password', '$homeadress')";
        $result = mysqli_query($con, $query);
        if ( false===$result ) {
            printf("error: %s\n", mysqli_error($con));
          }
          else {
            echo 'done.';
          }
        header("Location: index.php");
        die;
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
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
		
		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: white;">Signup</div>

			<div>
				<label for="username">Username:</label>
				<input id="text" type="text" name="username"><br><br>
			</div>

			<div>
				<label for="password">Password:</label>
				<input id="text" type="password" name="password"><br><br>
			</div>

			
			<div>
				<label for="homeadress">Your Home Adress:</label>
				<input id="text" type="text" name="homeadress"><br><br>
			</div>


			<input id="button" type="submit" value="Signup"><br><br>

			<a href="index.php">Click to Login</a><br><br>
		</form>
	</div>
</body>
</html>