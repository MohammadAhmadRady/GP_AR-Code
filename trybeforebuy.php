<!DOCTYPE html>
<html>
	<head>
		<title>Try Before Buy</title>
		<style>
			ul {
				list-style-type: none;
				margin: 0;
				padding: 0;
				overflow: hidden;
				background-color: #333;
			}
			body {
				background-image: url('bics/cover.jpg');
				background-repeat: no-repeat;
				background-attachment: fixed;
				background-size: 100% 100%;
			}
			li {
				float: left;
			}

			li a {
				display: block;
				color: white;
				text-align: center;
				padding: 14px 16px;
				text-decoration: none;
			}

			li a:hover:not(.active) {
				background-color: #111;
			}

			.active {
				background-color: #4CAF50;
			}
				
		</style>
		
	</head>
	
	<body>
		<ul>
			  <li><a href="Objects.php">Our Studio</a></li>
			  <li><a href="add_object.php">Add a Model</a></li>
			  <li><a href="Info.php">Company Information</a></li>
			  <li><a href="updateData.php">Update Company Information</a></li>
			  <li><a href="delete.php">Delete Company Information</a></li>
			  <li><a href="exit.php">Log Out</a></li>
		</ul>
	</body>
</html>