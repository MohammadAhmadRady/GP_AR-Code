<?php
	session_start();
	echo '<link rel="stylesheet" type="text/css" href="css/style.css">';
	$id = $_SESSION['key'];

	require_once ('connection.php');
	
	$connection = new Connect();
	
	$query = "select * from company where `co_id` = '$id'; ";
	
	$returned = $connection->excutequery($query);
	
	$row = mysqli_fetch_array($returned);
	echo "<title>Company Info</title>";
	echo "<br>"."<br>"."<br>"."<br>"."<br>"."<br>"."<br>"."<br>"."<br>";
	echo "<form class='theform' method='post' >";
	echo "<p style='color:red'>Company Name </p>".$row["coname"]."<br>"."<br>";
	echo "<p style='color:red'>Email </p>".$row["email"]."<br>"."<br>";
	echo "<p style='color:red'>Phone </p>".$row["phone"]."<br>"."<br>";
	echo "<p style='color:red'>Description </p>".$row["details"]."<br>"."<br>";
	echo "<p style='color:red'>Address </p>".$row["address"]."<br>"."<br>";
	echo "</form>";	
	
	$connection->closecon();	
?>