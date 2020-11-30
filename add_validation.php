<?php 
	session_start();
	$errors = array(); 
	
	$Description = '';
	$sameobj = '';
	$color = '';
	$price = '';
	$objname = '';
	
	require_once ('connection.php');
	$connection = new Connect();
	
	// Upload Item
	if (isset($_POST['up']) or isset($_POST['modify'])) 
	{ 
		// receive all input values from the form
		if(isset($_POST['desc'])) $Description=$_POST['desc'];
		
		if(isset($_POST['obj'])) $sameobj=$_POST['obj'];
		
		if(isset($_POST['color'])) $color=$_POST['color'];
		
		if(isset($_POST['price'])) $price=$_POST['price'];
		
		if(isset($_POST['objname'])) $objname=$_POST['objname'];
		
		// form validation: ensure that the form is correctly filled
		if (empty($objname)) { array_push($errors, "Object Name is required"); }
		if (empty($price)) { array_push($errors, "Price is required"); }
		if (empty($color)) { array_push($errors, "Color is required"); }
		if (empty($Description)) { array_push($errors, "Description is required"); }
		if (empty($sameobj)) { array_push($errors, "Object is required"); }
		
		// Upload item if there are no errors in the form
		if (count($errors) == 0) 
		{
			if (isset($_POST['up']))
			{
				$id = $_SESSION['key'];
				$query = "INSERT INTO object (coid , objName , color ,  description , price , obj) 
				VALUES('$id', '$objname' , '$color' , '$Description' , '$price' , '$sameobj')";
				$returned = $connection->excutequery($query);
				$connection->closecon();
				header('location: trybeforebuy.php');
			}
			//for modify
			else if (isset($_POST['modify']))
			{
				$id = $_SESSION['obj'];
				$query = "UPDATE `object` SET `objname`='$objname',
							`color`='$color',`description`='$Description',
							`price`='$price',`obj`='$sameobj' WHERE `objid` = '$id'";
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
		}
	}
?>