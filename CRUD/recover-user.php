<?php  

	require "./DB/db.php";


	// Connecting to DB

	$db = new DB();


	// Get id of user to be recovered

	$id = $_GET['id'];

	$db->recover($id);


?>