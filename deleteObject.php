<?php

	$errors = array(); 

	session_start();
	$id = $_SESSION['key'];//company id
	require_once ('connection.php');
	echo '<link rel="stylesheet" type="text/css" href="css/style.css">';

	$connection = new Connect();
	$password = '';//company

	if (isset($_POST['verfiy_password'])) 
	{
		// receive input value from the form
		if(isset($_POST['password_1'])) $password=$_POST['password_1'];
		
		// form validation: ensure that the form is correctly filled
		if (empty($password)) { array_push($errors, "Password is required"); }
		
		$photoID = $_GET['id2'];
		// delete item if there are no errors in the form
		if (count($errors) == 0) 
		{
			$query = "SELECT `password` FROM `company` WHERE `co_id` = '$id'";
			$returned = $connection->excutequery($query);
			if (mysqli_num_rows($returned) == 1)
			{
				$row=mysqli_fetch_array($returned);
				$newPass = $row["password"];
				if ($newPass == $password)
				{
					$query = "DELETE FROM `object` WHERE `objid` = '$photoID'";
					$returned = $connection->excutequery($query);
					if ($returned)
					{
						session_destroy();
						header("location:Objects.php");
					}
					else
					{
						echo "Not Deleted";
					}
				}
				else
				{
					array_push($errors, "Password is incorrect");
				}
			} 
		}
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Delete Object</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
		<div class="header">
			<h2>Delete ITEM</h2>
		</div>
		
		<form action = "<?php $_PHP_SELF ?>" method = "POST">

			<?php include('errors.php'); ?>
		
			<!__ password __>
			<div class="input-group">
				<label>Enter Password to confirm DELETION</label>
				<input type="password" name="password_1">
			</div>

			<?php 
				$id2 = $_GET['id2'];
				require_once ('connection.php');
			
				$connection = new Connect();
				
				$query = "select * from object where `objid` = '$id2' ";
				
				$returned = $connection->excutequery($query);

				$row = mysqli_fetch_array($returned);

				$src = "'bics/$row[obj]'";
				echo "<img src=$src id='img' style='width:35%'>";
			?>

			<div class="input-group">
				<button type="submit" class="btn" name="verfiy_password">Submit</button>
			</div>
			<td><a href='trybeforebuy.php'>Back</a></td>
            
		</form>
	</body>
</html>