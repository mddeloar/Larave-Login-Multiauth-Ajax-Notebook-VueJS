<?php
include("DB_connect.php");
?>


<!DOCTYPE html>
<html>
<head>
	<title>Add Attendence Mark</title>
	<style>
		body{background: #e6f7ff;margin-top: 50px;margin-left: 20%;color:#00ff00}

	</style>
</head>
<body>
	<form action="" method="post">
		<h2 style="color: blue">Enter roll and his/her attendance</h2>
		Roll<br><input type="text" name="roll" placeholder="Enter Roll"><br><br>
		Attendence<br><input type="text" name="attendence" placeholder="Attendence mark"><br><br>
		<input type="submit" name="submit" value="Submit">
	</form>
	<br><br><a href = "Home.html" style="color:black">Click here to go back home page</a><br>
</body>

<html>

<?php
if (isset($_POST['submit'])) {
		
		$roll = $_POST['roll'];
		$attendence = $_POST['attendence'];
			
		$sql = "INSERT into attendence(roll,a_mark) values('$roll','$attendence')";
		$res = mysqli_query($conn,$sql);
		//include('Home.html');
		if ($res) {
			echo "Successfully Inserted.";
		}
		else{
			echo "Unsuccessful.";
		}

	}
?>
