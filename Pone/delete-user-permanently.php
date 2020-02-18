<?php  

	require ".db.php";


	// Connecting to DB

	$db = new DB();

	//Fetch id to delete user

	$id = $_GET['id'];

	$db->deletePermanant($id);

	header("Location:index.php");

?>