<?php 
	$errors = array(); 

	session_start();
	$id = $_SESSION['key'];//company id
	require_once ('connection.php');
	echo '<link rel="stylesheet" type="text/css" href="css/style.css">';

	$connection = new Connect();

	if (isset($_POST['verfiy_password'])) 
	{
		// receive input value from the form
		if(isset($_POST['password_1'])) $password=$_POST['password_1'];
		
		// form validation: ensure that the form is correctly filled
		if (empty($password)) { array_push($errors, "Password is required"); }
		
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
					$query1 = "DELETE FROM `company` WHERE `co_id` = '$id'";
					$returned1 = $connection->excutequery($query1);
					
					$query2 = "DELETE FROM `object` WHERE `coid` = '$id'";
					$returned2 = $connection->excutequery($query2);

					if($returned1 AND $returned2)
					{
						session_destroy();
						$connection->closecon();
						header('location: login.php'); 
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
		<title>Delete Company Info</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
		<div class="header">
			<h2>Delete Company Info</h2>
		</div>
		
		<form action = "<?php $_PHP_SELF ?>" method = "POST">

			<?php include('errors.php'); ?>
		
			<!__ password __>
			<div class="input-group">
				<label>Password</label>
				<input type="password" name="password_1">
			</div>
			
			<div class="input-group">
				<button type="submit" class="btn" name="verfiy_password">Submit</button>
			</div>
			<td><a href='trybeforebuy.php'>Back</a></td>
            
		</form>
	</body>
</html>