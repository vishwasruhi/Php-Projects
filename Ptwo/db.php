<?php

	class DB
	{

		protected $conn;

		public function __construct()
		{

			$this->conn=new mysqli("localhost","root","","login");
		}	
		
		public function index($email,$password)
		{

			$email=mysqli_real_escape_string($this->conn,$email);
			$password=mysqli_real_escape_string($this->conn,$password);

			// 	if(isset($_POST['submit']))
			// {
			$sql="SELECT * FROM users WHERE email='$email' and password='$password'";

			$users=$this->conn->query($sql);
			if($this->conn->error)
			{
				print_r($this->conn->error);
			}
			return $users;
		}


	}

?>