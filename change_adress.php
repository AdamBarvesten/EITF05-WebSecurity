<?php
include("session.php");
include("connection.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {

	$token = filter_input(INPUT_POST, 'token', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
	
	if (!$token || $token !== $_SESSION['CSRF_token']) {
		echo "<h1>405 Did not Succeed</h1>";		
		echo "<strong>Your token is </strong> <br>" . $token;
		var_dump($token);
		echo "<br><strong>The session token is </strong>" .$_SESSION['CSRF_token'];
		header($_SERVER['SERVER_PROTOCOL'] . ' 405 Method Not Allowed');
		exit;
	}

	$homeadress = $_POST['homeadress'];
	if(empty($homeadress)){
		echo "Please enter an adress.";
	}else{
		$query = "UPDATE admin SET adress='$homeadress' WHERE username='$login_session'";
		$result = mysqli_query($con, $query);
		if ($result) {
				echo 'Your adress has been updated sucessfully.';
		} else {
				printf("error: %s\n", mysqli_error($con));
		}
	}
}
?>


<!DOCTYPE html>
<html>

<head>
	<title>Change adress</title>
</head>

<body>

	<style type="text/css">
		#text {

			height: 25px;
			border-radius: 5px;
			padding: 4px;
			border: solid thin #aaa;
			width: 100%;
		}

		#button {

			padding: 10px;
			width: 100px;
			color: white;
			background-color: lightblue;
			border: none;
		}

		#box {

			background-color: grey;
			margin: auto;
			width: 300px;
			padding: 20px;
		}
	</style>

	<div id="box">
		<form id="csrf-form" method="post">
			<div style="font-size: 20px;margin: 10px;color: white;">Change adress</div>
			<div>
				<label for="homeadress">New Home Adress:</label>
				<input id="text" type="text" name="homeadress"><br><br>
			</div>
				<input type="hidden" name="token" value="<?php echo $_SESSION['CSRF_token'] ?? '' ?>">
				<input id="button" type="submit" value="Submit"><br><br>
			<a href="welcome.php">Go back</a><br><br>
		</form>
	</div>
</body>

</html>