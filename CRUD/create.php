<?php  
	
	require "DB/db.php";

	$db = new  DB();

	
	$roll = $_POST['roll'];
	$name = $_POST['name'];
	$address = $_POST['address'];

	// if(! $id || $roll || $name || $address) {
	// 	header('Location:index.php');
	// }


	$db->create($roll, $name, $address);

	header("Location:index.php");


?>