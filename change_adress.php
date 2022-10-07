<?php
include('session.php');
include("connection.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
	
	$homeadress = $_POST['homeadress'];

	if(empty($homeadress)){
		echo "Please enter an adress.";
	}else{
		$query = "UPDATE admin SET adress='$homeadress' WHERE username='$login_session'";
		$result = mysqli_query($con, $query);
		if ($result) {
				echo 'Done.';
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
		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: white;">Change adress</div>
			<div>
				<label for="homeadress">New Home Adress:</label>
				<input id="text" type="text" name="homeadress"><br><br>
			</div>
			<input id="button" type="submit" value="Submit"><br><br>
			<a href="welcome.php">Go back</a><br><br>
		</form>
	</div>
</body>

</html>