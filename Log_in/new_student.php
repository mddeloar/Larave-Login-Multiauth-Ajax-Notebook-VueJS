<?php
include("DB_connect.php");
?>



<!DOCTYPE html>
<html>
<head>
	<title>Add New Student Information</title>
	<style>
		body{background: #ffffcc;margin-top: 50px;margin-left: 20%;color:white}
		a{font-size: 15px;color: white;text-decoration: none;padding-right: 5px;}
		a:hover{color: #AAAAAA;}

	</style>
</head>
<body>
<?php  

				echo "<p style='margin-top: 50px;color:red;font-size: 30px;'></p>";
				echo "<p style='margin-top: 50px;color:#27B127;font-size: 30px;'></p>";
				echo "<h2 style='margin-top: 50px; color:red;'>Enter Roll & Name and Select Department & Session. </h2>";
				
				echo '<form action="" method="post">';
				?>
				<?php

				echo '<p style="color:green">Roll<br><input type="text" name="roll" placeholder="Enter Roll"><br></p>
				<p style="color:blue">Name<br><input type="text" name="name" placeholder="Enter Name"><br></p>'
				?>

<?php 
				echo '<p style="color:#cc6600;">Department<br><select name="department">
						<option selected="selected" value="CSE">CSE</option>
						<option value="EEE">EEE</option>
						<option value="ICE">ICE</option>
						<option value="ETE">ETE</option>
					</select></p>';

				echo '<p style="color:red;">Session<br><select name="session">
						<option value="2013-14">2013-14</option>
						<option selected="selected" value="2014-15">2014-15</option>
						<option value="2015-16">2015-16</option>
						<option value="2016-17">2016-17</option>
					</select></p>';	

				echo'<input type="submit" name="submit" value="Submit"></form>';
			
		?>
		<br><br><a href = "Home.html" style="color: black">Click here to go back home page</a>

</body>

</html>
<?php
if (isset($_POST['submit'])) {
		
		$roll=$_POST['roll'];
		$name=$_POST['name'];
		$department = $_POST['department'];
		$session = $_POST['session'];
			
		$sql = "INSERT into student(roll,name,department,session) values('$roll','$name','$department','$session')";
		$res = mysqli_query($conn,$sql);
		//include('Home.html');
		if ($res) {
			echo "Information inserted successfully";
		}
		else{
			echo "Difficulty in Insertion";
		}

	}
?>