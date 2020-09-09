<?php
include("DB_connect.php");
?>


<!DOCTYPE html>
<html>
<head>
	<title>Add Attendence</title>
	<style>
		body{background: #f5f5f0;margin-top: 50px;margin-left: 20%;color:#00ff00}

	</style>
</head>
<body>
	<form action="" method="get">
		<!--Type <br><input type="text" name="type" placeholder="CT=0,Atndnc=1,Prntsn=2"><br>NB: Class Test=0, Attendence=1, Presentation=2<br>-->
		<?php 

				echo "<h2 style='color:blue'>Enter student's session and department</h2>";
				echo '<p style="color:red;">Session<br><select name="session">
						<option value="2013-14">2013-14</option>
						<option selected="selected" value="2014-15">2014-15</option>
						<option value="2015-16">2015-16</option>
						<option value="2016-17">2016-17</option>
					</select></p>';	
				echo '<p>Department<br><select name="department">
						<option selected="selected" value="CSE">CSE</option>
						<option value="EEE">EEE</option>
						<option value="ICE">ICE</option>
						<option value="ETE">ETE</option>
					</select></p>';

				echo'<input type="submit" name="submit" value="Submit"></form>';

				if (isset($_GET['submit'])) 
				{
					//$type = $_GET['type'];
					$session = $_GET['session'];
					$department = $_GET['department'];


					/*********** delete_plz is in here **************/


//$type=0;/********************************* TYPE***********************************/
/*if($type==0)
{
	echo "Class Test: ";
}
elseif ($type==1) {
	echo "Assignment: ";
}
else
{
	echo "Presentation: ";
}
$sql = "SELECT max(number)+1 as number
		FROM class_test
		WHERE type=$type";/********************************* TYPE***********************************/
/*$res = mysqli_query($conn,$sql);
$rows=mysqli_fetch_assoc($res);
echo $rows['number'];
$number = $rows['number'];
//echo "$number";
echo "<br>";
echo "Tpye = ";
echo "$type";
echo "<br><br>";*/
$query = "SELECT roll
		FROM student
		where department= '$department' AND session= '$session'";/******** Department & Session***************/
$res = mysqli_query($conn,$query);
//$i=0;


if(mysqli_num_rows($res)>0)
{
	echo '<form action="" method="post">';
	while ($rows=mysqli_fetch_assoc($res)) {
		echo "Roll:";
		echo $rows['roll'];
		//$roll[$i++] = $rows['roll'];
		?>
		<!--<form action="" method="post">-->

		Attendance:<input type="text" name="mark[<?=$rows['roll']?>]" placeholder="mark"><br><br>

		<!--</form>-->

		<?php
		//echo "<br>";
	}
	echo'<input type="submit" name="submit2" value="Submit"></form>';


	
}
}



if(isset(($_POST['submit2']))){


//var_dump($_POST["mark"]);
	foreach($_POST["mark"] as $roll=>$mark)
	{
		$sql1 = "INSERT INTO attendence(roll,a_mark) VALUES('$roll','$mark')";
		//echo "INSERT INTO class_test(roll,number,mark,type) VALUES('$roll','$number','$mark','$type')";
		$res1 = mysqli_query($conn,$sql1);
		if($res1)
		{
			echo " Successfull .";
		}
		else
		{
			echo "Unsuccessful.";
		}
	}
	
		
}

		echo "<br>";				
		?>
	</form>
	<br><br><a href = "Home.html" style="color:blue">Click here to go back home page</a><br>
</body>

<html>

