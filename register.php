<?php include('validation.php') ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Register</title>	
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
		<div class="header">
			<h2>Register</h2>
		</div>
		
		<form method="post" action="register.php" >

			<?php include('errors.php'); ?>

			<div class="input-group">
				<label>Company Name</label>
				<input type="text" name="username" >
			</div>
			
			<div class="input-group">
				<label>Email</label>
				<input type="email" name="email" >
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
				<input type="text" name="phone">
			</div>
			
			<div class="input-group">
				<label>Address</label>
				<input type="text" name="address">
			</div>
			
			<div class="input-group">
				<label>Company Description</label>
				<input type="text" name="desc">
			</div>
			
			
			<div class="input-group">
				<button type="submit" class="btn" name="register">Register</button>
			</div>

			<p>
				Already a member? <a href="login.php">Sign in</a>
			</p>
		</form>
	</body>
</html>