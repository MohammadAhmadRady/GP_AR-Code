<?php 
	session_start();
	$errors = array(); 
	
	$username = '';
	$email = '';
	$phone = '';
	$desc = '';
	$address = '';
	$password_1 = '';
	$password_2 = '';
	
	require_once ('connection.php');
	$connection = new Connect();
	
	// REGISTER USER AND MODIFY
	if (isset($_POST['register']) or isset($_POST['modify'])) 
	{
		// receive all input values from the form
		if(isset($_POST['username'])) $username=$_POST['username'];
		
		if(isset($_POST['email'])) $email=$_POST['email'];
		
		if(isset($_POST['phone'])) $phone=$_POST['phone'];
		
		if(isset($_POST['desc'])) $desc=$_POST['desc'];
		
		if(isset($_POST['address'])) $address=$_POST['address'];
		
		if(isset($_POST['password_1'])) $password_1=$_POST['password_1'];
		
		if(isset($_POST['password_2'])) $password_2=$_POST['password_2'];

		// form validation: ensure that the form is correctly filled
		if (empty($username)) { array_push($errors, "Company Name is required"); }
		if (empty($email)) { array_push($errors, "Email is required"); }
		if (empty($phone)) { array_push($errors, "Phone is required"); }
		if (empty($desc)) { array_push($errors, "Description is required"); }
		if (empty($address)) { array_push($errors, "Address is required"); }
		if (empty($password_1)) { array_push($errors, "Password is required"); }

		if ($password_1 != $password_2) {
			array_push($errors, "The two passwords do not match");
		}
		// register user if there are no errors in the form
		if (count($errors) == 0) 
		{
			if (isset($_POST['register']))
			{
				$query = "SELECT * FROM `company` WHERE `email` = '$email' ";
				$results = $connection->excutequery($query);
				$flag = false;
				if (mysqli_num_rows($results) == 1) 
				{	
					array_push($errors, "Email already exists");
					$flag = true;
				}
				if ($flag==false)
				{
					$query = "INSERT INTO company (password , email , phone , coname , address , details) 
							VALUES('$password_1', '$email', '$phone' , '$username', '$address', '$desc' )";
					$results = $connection->excutequery($query);
					if($results)
					{
						$query = "SELECT * FROM `company` WHERE `password` = '$password_1'  and `email` = '$email' ";
						$results = $connection->excutequery($query);

						if (mysqli_num_rows($results) == 1) 
						{	
								$row=mysqli_fetch_array($results);
								$_SESSION["key"] = $row["co_id"];
								$connection->closecon();
								header('location: trybeforebuy.php');				
						}
					}
					else
					{
						array_push($errors, "MISSED");
					}	
				}
			}
			//for modify
			else if (isset($_POST['modify']))
			{
				$id = $_SESSION['key'];
				$co_id = null;
	
				$query = "SELECT * FROM `company` WHERE `email` = '$email' ";
				$results = $connection->excutequery($query);
				$flag = false;
				if (mysqli_num_rows($results) == 1) 
				{	
					$row = mysqli_fetch_array($results);
					$co_id =  $row["co_id"] ;
					if($co_id != $id )
					{
						array_push($errors, "Email already exists");
						$flag = true;
					}	
				}
				if ($flag==false)
				{
					$query = "UPDATE `company` SET `password`='$password_1',
							`email`='$email',`phone`='$phone',`coname`='$username',
							`address`='$address',`details`='$desc' WHERE `co_id` = '$id' ";

					$results = $connection->excutequery($query);
					if($results)
					{
						$connection->closecon();	
						header('location: trybeforebuy.php');				
					}
					else
					{
						array_push($errors, "MISSED");
					}
				}	
				$connection->closecon();
			}	
		}
	}
	// ... 
	// LOGIN USER
	if (isset($_POST['login'])) 
	{
		// receive all input values from the form
		if(isset($_POST['email'])) $email=$_POST['email'];
		if(isset($_POST['password'])) $password=$_POST['password'];
		
		if (empty($email))  array_push($errors, "Email is required");
		if (empty($password)) array_push($errors, "Password is required");
		
		if (count($errors) == 0) 
		{
			$query = "SELECT * FROM `company` WHERE `password` = '$password'  and `email` = '$email' ";
			$results = $connection->excutequery($query);

			if (mysqli_num_rows($results) == 1) 
			{	
				$row=mysqli_fetch_array($results);
				
				$_SESSION["key"] = $row["co_id"];
				
				$connection->closecon();
				header('location: trybeforebuy.php');
			}
			else 
			{
				array_push($errors, "Wrong email/password combination");
			}
		}
	}
?>