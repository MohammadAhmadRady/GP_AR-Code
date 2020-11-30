<?php
	session_start();
	$id = $_SESSION['key'];
	require_once ('connection.php');
	echo '<link rel="stylesheet" type="text/css" href="css/style.css">';

	$connection = new Connect();
	
	$query = "select * from object where `coid` = '$id' ";
	
	$returned = $connection->excutequery($query);
	
	if (mysqli_num_rows($returned) == 0)
	{
		$img = "'bics/empty.jpg'";
		echo "<img src=$img id='img' style='width:100%'>";	
	}		
	else
	{
		echo "<br>"."<br>";
		while($row=mysqli_fetch_array($returned))
		{
			$src = "'bics/$row[obj]'";	
			$objectID = $row["objid"];
			echo "<title>Company Objects</title>";	
			echo "<form class='theform' method='post' action='deleteObject.php'>";
			echo "<p style='color:red'>Object Name </p>".$row["objname"]."<br>"."<br>";
			echo "<p style='color:red'>Color </p>".$row["color"]."<br>"."<br>";
			echo "<p style='color:red'>Description </p>".$row["description"]."<br>"."<br>";
			echo "<p style='color:red'>Price </p>".$row["price"]."<br>"."<br>";
			echo "<img src=$src id='img' style='width:100%'>"."<br>"."<br>"; 
            echo "<td><a href='updateObject.php?id2=$objectID'>Update Info</a></td>"."<br>";
            echo "<td><a href='deleteObject.php?id2=$objectID'>Delete the Object</a></td>";
			echo "</form>";
			echo "<br>"."<br>"."<br>";  
		}
	}
	$connection->closecon();
?>