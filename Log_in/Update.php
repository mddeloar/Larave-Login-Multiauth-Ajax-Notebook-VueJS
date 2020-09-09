<?php
include("DB_connect.php");
?>


<!DOCTYPE html>
<html>
<head>
	<title>Update</title>
	<style>
		body{background: #5F5F5F;margin-top: 50px;margin-left: 20%;color:#00ff00;}
		table, th, td {
			border: 1px solid black;
		}

	</style>
</head>
<body>
	<h1>Update</h1>
	<form action="" method="get">
		<?php

		if (isset($_GET['roll']))
		{
			$roll = $_GET['roll'];
			?>

			<input type="hidden" name="roll" value="<?php echo $roll ?>">
			<?php
			
			//echo $roll;
			$query1 = "SELECT ID,mark,type,number as number1
					FROM class_test
					WHERE roll='$roll'";
			$res1 = mysqli_query($conn,$query1);
			$query2 = "SELECT a_mark
			FROM attendence
			WHERE roll = '$roll'";
			$res2 = mysqli_query($conn,$query2);
			if(mysqli_num_rows($res1))
			{
				//$i=1;
				//$j=1;
				//$k=1;
				while($rows1= mysqli_fetch_assoc($res1))
				{
					$number=$rows1['number1'];
					//echo "Number: ";
					//echo $number;
					//echo "<br>";
					if($rows1['type']==0)
					{
						echo "Class Test: ";
						echo $rows1['number1'];
						//echo $i;
						//echo "    ";
						?>
						<input type="text" name="mark[<?=$rows1['ID']?>]" value=" <?php echo $rows1['mark'] ?> " ><br><br>
						<!--<input type="hidden" name="type[<?=$rows1['ID']?>]" value="0">-->
						<?php
						
						//$i++;
					}
					if($rows1['type']==1)
					{
						echo "Assignment: ";
						echo $rows1['number1'];
						//echo $j;
						//echo "   ";
						?>
						<input type="text" name="mark[<?=$rows1['ID']?>]" value=" <?php echo $rows1['mark'] ?> " ><br><br>
						<!--<input type="hidden" name="type[<?=$rows1['ID']?>]" value="1">-->
						<?php
						//$j++;
					}
					if($rows1['type']==2)
					{
						echo "Presentation: ";
						echo $rows1['number1'];
						//echo $k;
						?>
						<input type="text" name="mark[<?=$rows1['ID']?>]" value=" <?php echo $rows1['mark'] ?> " ><br><br>
						<!--<input type="hidden" name="type[<?=$rows1['ID']?>]" value="2">-->
						<?php
						//$k++;
					}
					
					//$i++;
				}

				?>
					
				<?php
			}
			if(mysqli_num_rows($res2))
			{
				$rows2= mysqli_fetch_assoc($res2);
				echo "Attendance: ";
				?>
				<input type="text" name="a_mark" value="<?php echo $rows2['a_mark'] ?>"><br><br>
				<?php
			}
			echo "Roll Number : ";
			echo $roll."<br>";

		}
		
		
		?>

	<?php 
	echo'<input type="submit" name="submit" value="submit"></form>';
	?>

	<?php
	if (isset($_GET['submit'])) 
	{
		//$ID = $_GET['ID'];
		//$number=$rows1['number1'];
		$roll=$_GET['roll'];
		//$type=$_GET['type'];

		
		$mark = $_GET["mark"];
		$a_mark = $_GET['a_mark'];
		//$type = ($_GET["type"] ;
		//if(!empty($mark) && !empty($type))
		{
			//$values = array_combine($mark, $type);
		
		foreach ($_GET["mark"] as $ID=>$mark) //&& (foreach($_GET["type"] as $ID=>$type))
		{
			//foreach($_GET["type"] as $ID=>$type)
			{

			//$sql1 = "INSERT INTO class_test(ID,roll,number,mark,type) VALUES('$ID','$roll','$number','$mark','$type')";
			//echo "INSERT INTO class_test(roll,number,mark,type) VALUES('$roll','$number','$mark','$type')";
			$sql1 = "UPDATE class_test set mark=$mark WHERE ID=$ID";
			echo "UPDATE class_test set mark=$mark WHERE ID=$ID ";
			$res2 = mysqli_query($conn,$sql1);
			if($res2)
			{
				echo " Successfull.";
			}
		}
	}
			}

			$sql2 = "UPDATE attendence set a_mark=$a_mark WHERE roll='$roll' ";
			echo "UPDATE attendence set a_mark=$a_mark WHERE roll='$roll' ";
			$res3 = mysqli_query($conn,$sql2);
			if($res3)
			{
				echo " Successfull.";
			}

	}
	?>

	<a href="display.php" style="color:#ffff00">Go back</a><br>


	<a href = "Home.html" style="color:#ffff00">Click here to go back home page</a><br>
</body>

<html>

