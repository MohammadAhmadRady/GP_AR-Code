<?php 
	include('validation.php');

	$id = $_SESSION['key'];

	echo '<link rel="stylesheet" type="text/css" href="css/style.css">';

	require_once ('connection.php');

	$connection = new Connect();
	
	$query = "select * from company where `co_id` = '$id' ";
	
	$returned = $connection->excutequery($query);
	
	$row = mysqli_fetch_array($returned);

	$desc = $row['details'];
	$phone = $row['phone'];
	$email = $row['email'];
	$name = $row['coname'];
	$address = $row['address'];
	
	$connection->closecon();

?>
	
	
<!DOCTYPE html>
<html>
	<head>
		<title>Update Data</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
		<div class="header">
			<h2>Modify Company Data</h2>
		</div>
		
		<form method="post" action="updateData.php" >

			<?php include('errors.php'); ?>

			<div class="input-group">
				<label>Company Name</label>
				<input type="text" name="username" value="<?php echo $name;?>">
			</div>
			
			<div class="input-group">
				<label>Email</label>
				<input type="email" name="email" value="<?php echo $email;?>">
			</div>
			
			<div class="input-group">
				<label>Password</label>
				<input type="password" name="password_1">
			</div>
			
			<div class="input-group">
				<label>Confirm password</label>
				<input type="password" name="password_2">
			</div>
			
			<div class="input-group">
				<label>Phone</label>
				<input type="text" name="phone" value="<?php echo $phone;?>">
			</div>
			
			<div class="input-group">
				<label>Address</label>
				<input type="text" name="address" value="<?php echo $address;?>">
			</div>
			
			<div class="input-group">
				<label>Company Description</label>
				<input type="text" name="desc" value="<?php echo $desc;?>">
			</div>
			
			
			<div class="input-group">
				<button type="submit" class="btn" name="modify">Save</button>
			</div>

		</form>
	</body>
</html>