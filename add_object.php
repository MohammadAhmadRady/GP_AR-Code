<?php include('add_validation.php') ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Add Object</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
		<div class="header">
			<h2>Upload Object</h2>
		</div>
		
		<form method="post"action="add_object.php">

			<?php include('errors.php'); ?>


			<!__ Name __>     
			<div class="input-group">
				<label>Object Name</label>
				<input type="text" name="objname">
			</div>
			
			<!__ Price __>     
			<div class="input-group">
				<label>Price</label>
				<input type="text" name="price">
			</div>
			
			<!__ Color __>     
			<div class="input-group">
				<label>Color</label>
					<select style="width: 150px"  name="color">
						<option></option>
						<option value="Red">Red</option>
						<option value="Black">Black</option>
						<option value="White">White</option>
						<option value="Green">Green</option>
						<option value="Blue">Blue</option>
						<option value="Yellow">Yellow</option>
						<option value="Brown">Brown</option>
						<option value="Purble">Purble</option>
					</select>   
				<!__ Category     <input type="text" name="color">
			</div>
			
			
			<!__ Description __>   
			<div class="input-group">
				<label>Description</label>
				<input type="text" name="desc">
			</div>
			
			<!__ Object __>   
			<div class="input-group">
				<label>Upload Object</label>
				<input type="file" name="obj">
			</div>
			
			
			<div class="input-group">
				<button type="submit" class="btn" name="up">Upload	</button>
			</div>

		</form>
	</body>
</html>