<?php 
	include('add_validation.php');

	echo '<link rel="stylesheet" type="text/css" href="css/style.css">';

	require_once ('connection.php');

	$connection = new Connect();

	$id = $_GET['id2'];

	$query = "select * from object where `objid` = '$id' ";
	
	$returned = $connection->excutequery($query);
	
	$row = mysqli_fetch_array($returned);

	$Description = $row["description"];
	$sameobj = "bics/".$row["obj"];
	$color = $row["color"];
	$price = $row["price"];
	$objname = $row["objname"];

	$connection->closecon();

?>
	
	
<!DOCTYPE html>
<html>
	<head>
		<title>Update Object</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
		<div class="header">
			<h2>Modify Object Info</h2>
		</div>
		
		<form method="post" action="updateObject.php" >

			<?php include('errors.php'); ?>


			<!__ Name __>     
			<div class="input-group">
				<label>Object Name</label>
				<input type="text" name="objname" placeholder="<?php echo $objname;?>">
			</div>

			<!__ Price __>     
			<div class="input-group">
				<label>Price</label>
				<input type="text" name="price" placeholder="<?php echo $price;?>"> 
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
				<!__ Category     <input type="text" name="color" placeholder="<?php echo $color;?>">
			</div>


			<!__ Description __>   
			<div class="input-group">
				<label>Description</label>
				<input type="text" name="desc" placeholder="<?php echo $Description;?>">
			</div>

			<!__ Object __>   
			<div class="input-group">
				<label>Upload Object</label>
				<input type="file" name="obj">
			</div>

			<img src="<?php echo $sameobj;?>" id='img' style='width:20%'>
			
			<div class="input-group">
				<button type="submit" class="btn" name="modify">Save</button>
			</div>

		</form>
	</body>
</html>