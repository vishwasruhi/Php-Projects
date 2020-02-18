<?php

	require "./db.php";

	$db=new DB();
	
	if(isset($_POST['submit']))
	{
		$email=$_POST['email'];
		$password=$_POST['password'];

		$db->index($email,$password);

		// header('location:index.php');

	}


?>