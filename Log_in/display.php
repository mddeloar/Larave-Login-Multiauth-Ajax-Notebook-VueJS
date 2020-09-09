<?php
include("DB_connect.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Show result chart</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
		body{background: #e6ffe6;margin-left:50px;margin-right: 50px; color:#00ff00;}
		table, th, td {
			border: 1px solid black;
			
		}

	</style>
</head>
<body>
	<h1>Enter session and department that want to see information</h1>
	<form action="" method="get">
	<?php 

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
				//echo "<br><br>";
	?>

<?php
if (isset($_GET['submit'])) 
{
	//echo "<h2>Result Chart";
	$session = $_GET['session'];
	$department = $_GET['department'];

	//Roll
	$query1 = "SELECT roll
		FROM student
		where department= '$department' AND session= '$session'";
	$res1 = mysqli_query($conn,$query1);
	$query9 = "SELECT roll
		FROM student
		where department= '$department' AND session= '$session' LIMIT 1";
	$res9 = mysqli_query($conn,$query9);
	$rows9 = mysqli_fetch_assoc($res9);
	$tempo = $rows9['roll'];

	$query10 = "SELECT count(mark) as number10 FROM student NATURAL JOIN class_test WHERE student.roll = class_test.roll AND session='$session' AND student.department='$department' AND type=0 AND roll = '$tempo'";
	$query11 = "SELECT count(mark) as number11 FROM student NATURAL JOIN class_test WHERE student.roll = class_test.roll AND session='$session' AND student.department='$department' AND type=1 AND roll = '$tempo'";
	$query12 = "SELECT count(mark) as number12 FROM student NATURAL JOIN class_test WHERE student.roll = class_test.roll AND session='$session' AND student.department='$department' AND type=2 AND roll = '$tempo'";
	$res10 = mysqli_query($conn,$query10);
	$res11 = mysqli_query($conn,$query11);
	$res12 = mysqli_query($conn,$query12);
	$rows10=mysqli_fetch_assoc($res10);
	$rows11=mysqli_fetch_assoc($res11);
	$rows12=mysqli_fetch_assoc($res12);
	$temp10 = $rows10['number10'];
	$temp11 = $rows11['number11'];
	$temp12 = $rows12['number12'];

	$query2 = "SELECT max(number) as countmark
				FROM class_test NATURAL JOIN student
				WHERE student.roll= class_test.roll AND student.department= '$department' 
				AND student.session='$session'";
	$res2 = mysqli_query($conn,$query2);
	$query3 = "SELECT max(number) as number
		FROM student NATURAL JOIN class_test 
WHERE student.roll = class_test.roll AND session='$session'
AND student.department='$department' AND type=0";

	$query4 = "SELECT max(number) as number1
		FROM student NATURAL JOIN class_test 
WHERE student.roll = class_test.roll AND session='$session'
AND student.department='$department' AND type=1";


	$query5 = "SELECT max(number) as number2
		FROM student NATURAL JOIN class_test 
WHERE student.roll = class_test.roll AND session='$session'
AND student.department='$department' AND type=2";

	$res3 = mysqli_query($conn,$query3);
	$res4 = mysqli_query($conn,$query4);
	$res5 = mysqli_query($conn,$query5);
	$rows3=mysqli_fetch_assoc($res3);
	$rows4=mysqli_fetch_assoc($res4);
	$rows5=mysqli_fetch_assoc($res5);
	
	//$count = $rows3['number']+$rows4['number1']+$rows5['number2'];
	?>

	<table style="width: 100%">
		<caption style="font-size: 40px; color: blue" >Result Chart</caption>
		<tr>
		<th>Roll</th>



		<?php 
		if(mysqli_num_rows($res3)>0)
		//if(($rows3 = mysqli_fetch_assoc($res3)) && !is_null($rows3['number']))
		//if($rows3['number']>0)
		{
		?>

		
			<?php for ($i=0; $i <$rows3['number'] ; $i++) { 
				?><th>Class Test-<?php echo ($i+1); ?></th>
				
			<?php } ?>
			
		<?php } ?>


		<?php 
		if(mysqli_num_rows($res4)>0)
		//if(($rows4 = mysqli_fetch_assoc($res4)) && !is_null($rows4['number1']))
		//if($rows4['number1']>0)
		{
		?>

		
			<?php for ($i=0; $i <$rows4['number1'] ; $i++) { 
				?><th>Assignment-<?php echo ($i+1); ?></th>
				
			<?php } ?>
			
		<?php } ?>


		<?php 
		if(mysqli_num_rows($res5)>0)
		//if(($rows5 = mysqli_fetch_assoc($res5)) && !is_null($rows5['number2']))
		//if($rows5['number2']>0)
		{
		?>

		
			<?php for ($i=0; $i <$rows5['number2'] ; $i++) { 
				?><th>Presentation-<?php echo ($i+1); ?></th>
				
			<?php } ?>
			
		<?php } ?>

		<th>Sum of Best 2 in 3</th>
		<th>Attendence</th>
		<th>Total</th>

		</tr>
		<?php
		while($rows1=mysqli_fetch_assoc($res1))
		{
			//echo $rows1
			?>
			<tr style="text-align: center; color: red">
				<td><?php echo $rows1['roll']?> </td>
				<?php
				$temp =  $rows1['roll'];
				$query6 = "SELECT roll,mark,type,number FROM student NATURAL JOIN class_test WHERE student.roll = class_test.roll AND Session='$session'AND student.department='$department'AND student.roll='$temp' ORDER BY type";
				$res6 = mysqli_query($conn,$query6);

				$query13 = "SELECT count(mark) as number13 FROM student NATURAL JOIN class_test WHERE student.roll = class_test.roll AND session='$session' AND student.department='$department' AND type=0 AND roll = '$temp'";
	$query14 = "SELECT count(mark) as number14 FROM student NATURAL JOIN class_test WHERE student.roll = class_test.roll AND session='$session' AND student.department='$department' AND type=1 AND roll = '$temp'";
	$query15 = "SELECT count(mark) as number15 FROM student NATURAL JOIN class_test WHERE student.roll = class_test.roll AND session='$session' AND student.department='$department' AND type=2 AND roll = '$temp'";
	$res13 = mysqli_query($conn,$query13);
	$res14 = mysqli_query($conn,$query14);
	$res15 = mysqli_query($conn,$query15);
	$rows13=mysqli_fetch_assoc($res13);
	$rows14=mysqli_fetch_assoc($res14);
	$rows15=mysqli_fetch_assoc($res15);
	$temp13 = $rows13['number13'];
	$temp14 = $rows14['number14'];
	$temp15 = $rows15['number15'];

				if(mysqli_num_rows($res6))
				{
					if(($temp10+$temp11+$temp12)!=($temp13+$temp14+$temp15))
					{

						$query77 = "SELECT number,type FROM student NATURAL JOIN class_test WHERE student.roll = class_test.roll AND session='$session' AND student.department='$department' AND roll = '$tempo' ORDER BY type";
				$res77 = mysqli_query($conn,$query77);
				while($rows77=mysqli_fetch_assoc($res77)){
						$vari = $rows77['number'];
						$varit = $rows77['type'];

						$query21 = "SELECT roll,mark,type,number FROM student NATURAL JOIN class_test WHERE student.roll = class_test.roll AND Session='$session'AND student.department='$department'AND student.roll='$temp' ORDER BY type";

					$res21 = mysqli_query($conn,$query21);
					$check1 = 0;
					while($rows21=mysqli_fetch_assoc($res21))
					{
						$vari1 = $rows21['number'];
						$varit1 = $rows21['type'];
						
					if($vari1==$vari && $varit==$varit1){
						$check1=1;

						?>
					<td><?php echo $rows21['mark']; ?></td>
					<?php
					}
					}
					if($check1==0)
					{

						?>
							<td><?php echo "Absent"; ?></td>
							<?php
					}
					}
					}

				else{
				while($rows6=mysqli_fetch_assoc($res6))
				{

					?>
					<td><?php echo $rows6['mark']; ?></td>
					<?php
				}
			}
				}
				else
				{
					for ($i=0; $i < ($temp10+$temp11+$temp12); $i++) { 
						?>
						<td><?php echo "Absent"; ?></td>
						<?php
					}
				}

				?>


				<?php
				$query7 = "SELECT mark  FROM student NATURAL JOIN class_test WHERE student.roll = class_test.roll AND session='$session'AND student.department='$department' AND student.roll='$temp'
					ORDER  BY roll asc,mark desc LIMIT 2";

				$res7 = mysqli_query($conn,$query7);
				//$rows7 = mysqli_fetch_assoc($res7);
				$BestTwo=0;
				while($rows7 = mysqli_fetch_assoc($res7))
				{
					$BestTwo+=$rows7['mark'];
				}
				?>
					<td><?php echo $BestTwo; ?></td>
					<?php
				
				?>


				<?php
				$query8 = "SELECT roll,a_mark FROM student NATURAL JOIN attendence WHERE student.roll = attendence.roll AND Session='$session'AND student.department='$department'AND student.roll='$temp'";
				$res8 = mysqli_query($conn,$query8);
				$attendence = 0;
				if(mysqli_num_rows($res8)){
				$rows8 = mysqli_fetch_assoc($res8);
				$attendence = $rows8['a_mark'];
			}
				?>
					<td><?php echo $attendence; ?></td>

				<?php
				$Total = $BestTwo+$attendence;
				?>
					<td><?php echo $Total; ?></td>

				<?php
			

				?>
				<td>
					<a href="Update.php?<?php echo ("roll=$temp") ?> ">
					<buttons tyle="color: #cc3300">Edit</button>
					</a>
				</td>

			</tr>
			
			<?php
		} ?>

	</table>
	<?php


}

echo "<br><br>";
?>
	<br><br><a href = "Home.html" style="color:#ffff00  value = ">Click here to go back home page</a><br>
</body>

<html>

