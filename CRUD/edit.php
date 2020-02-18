<?php  
	
	require "DB/db.php";

	$db = new  DB();

	$id = $_POST['id'];
	$roll = $_POST['roll'];
	$name = $_POST['name'];
	$address = $_POST['address'];

	// if(! $id || $roll || $name || $address) {
	// 	header('Location:index.php');
	// }


	$db->update($id , $roll, $name, $address);

	header("Location:index.php");


?>