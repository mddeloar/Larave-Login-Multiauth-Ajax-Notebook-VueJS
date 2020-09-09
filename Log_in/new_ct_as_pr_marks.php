<?php
include("DB_connect.php");
?>


<!DOCTYPE html>
<html>
<head>
	<title>Add CT/Assignment/Presentation Mark</title>
	<style>
		body{background: white;margin-top: 50px;margin-left: 20%;color:#00ff00}

	</style>
</head>
<body>
	<form action="" method="get">
		<h2 style="color:blue">Enter Type of mark, student's deparment and session </h2>
		Type <br><input type="text" name="type" placeholder="CT=0,Atndnc=1,Prntsn=2"><br>NB: Class Test=0, Attendence=1, Presentation=2<br>
		<?php 

				echo '<p style="color:red;">Session<br><select name="session">
						<option value="2013-14">2013-14</option>
						<option selected="selected" value="2014-15">2014-15</option>
						<option value="2015-16">2015-16</option>
						<option value="2016-17">2016-17</option>
					</select></p>';	
				echo '<p style="color:blue;">Department<br><select name="department">
						<option selected="selected" value="CSE">CSE</option>
						<option value="EEE">EEE</option>
						<option value="ICE">ICE</option>
						<option value="ETE">ETE</option>
					</select></p>';

				echo'<input type="submit" name="submit" value="Submit"></form>';

				if (isset($_GET['submit'])) 
				{
					$type = $_GET['type'];
					$session = $_GET['session'];
					$department = $_GET['department'];


					/*********** delete_plz is in here **************/


//$type=0;/********************************* TYPE***********************************/
if($type==0)
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
/*$sql = "SELECT max(number)+1 as number
		FROM class_test
		WHERE type=$type";*//******************* ************** TYPE***********************************/
$sql = "SELECT max(number)+1 as number 
		FROM class_test JOIN student ON class_test.roll= student.roll 
		WHERE type=$type AND student.department='$department' AND student.session='$session' ";

/*echo "SELECT max(number)+1 as number 
		FROM class_test JOIN student ON class_test.roll= student.roll 
		WHERE type=$type AND student.department='$department' AND student.session='$session' ";*/

$res = mysqli_query($conn,$sql);
//$check = mysqli_num_rows($res);
//echo "<br> $check <br>";
//if(is_null($check))  /******************** For Presentation:1 - Can't Insert********/

if(($row = mysqli_fetch_assoc($res)) && is_null($row['number']))
{
	$number=1;
	//var_dump($row['number']);
}
else
{
	//$rows=mysqli_fetch_assoc($res);
	//echo $rows['number'];
	$number = $row['number'];
}
//$number=1;
/*if(mysqli_num_rows($res))
{
	$rows=mysqli_fetch_assoc($res);
echo $rows['number'];
$number = $rows['number'];
}
else
{
	$number=1;
}*/

echo "number: ".$number;
echo "<br>";
echo "Tpye = ";
echo "$type";
echo "<br><br>";
$query = "SELECT roll
		FROM student
		where department= '$department' AND session= '$session'";/******** Department & Session***************/
$res = mysqli_query($conn,$query);
$i=0;


if(mysqli_num_rows($res)>0)
{
	echo '<form action="" method="post">';
	while ($rows=mysqli_fetch_assoc($res)) {
		echo "Roll:";
		echo $rows['roll'];
		//$roll[$i++] = $rows['roll'];/************************* Comment koresi **********/
		?>
		<!--<form action="" method="post">-->

		Mark:<input type="text" name="mark[<?=$rows['roll']?>]" placeholder="mark"><br><br>

		<!--</form>-->

		<?php
		//echo "<br>";
	}
	echo'<input type="submit" name="submit2" value="Submit"></form>';


	
}
}



if(isset(($_POST['submit2']))){



	foreach($_POST["mark"] as $roll=>$mark)
	{
		$sql1 = "INSERT INTO class_test(roll,number,mark,type) VALUES('$roll','$number','$mark','$type')";
		//echo "INSERT INTO class_test(roll,number,mark,type) VALUES('$roll','$number','$mark','$type')";
		$res1 = mysqli_query($conn,$sql1);
		if($res1)
		{
			echo " Successfull.";
		}
	}
	
		
}

						
		?>
	</form>
	<br><br><br><a href = "Home.html" style="color:black">Click here to go back home page</a><br>
</body>

<html>

