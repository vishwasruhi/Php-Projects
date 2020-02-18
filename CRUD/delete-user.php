<?php 

	require "./DB/db.php";

	$db = new DB();

	$id = $_GET['id'];

	$db->delete($id);

	header("Location:index.php");

?>