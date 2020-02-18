<?php 

	// CREATE TABLE  COMMAND 

	// CREATE TABLE `crud`.`students` ( `id` SERIAL NULL AUTO_INCREMENT , `roll` INT(10) NULL , `name` VARCHAR(30) NOT NULL , `address` INT(50) NOT NULL , PRIMARY KEY (`id`), UNIQUE (`roll`)) ENGINE = InnoDB;

	class DB {

		protected $conn;

		public function __construct(){

			//Conntect to Db
			$this->conn = new mysqli("localhost","root","","crud");

			// Check connection
			if (mysqli_connect_errno())
			  {
			  echo "Failed to connect to MySQL: " . mysqli_connect_error();
		  	}

		}

		public function deletedindex(){
			//Preparing SQL Query
			$sql = "SELECT * FROM students where is_deleted=1";

			// Executing Query

			$students = $this->conn->query($sql);

			if($this->conn->error){
				print_r($this->conn->error);
				exit();
			}

			return $students;

		}

		public function index(){
			//Preparing SQL Query
			$sql = "SELECT * FROM students where is_deleted=0";

			// Executing Query

			$students = $this->conn->query($sql);

			if($this->conn->error){
				print_r($this->conn->error);
				exit();
			}

			return $students;

		}

		public function create($roll, $name, $address ){

			// Escapes special characters in a string for use in an SQL statement
			$roll = mysqli_real_escape_string($this->conn, $roll);
			$name = mysqli_real_escape_string($this->conn, $name);
			$address = mysqli_real_escape_string($this->conn, $address);

			// Preparing SQL statement
			$sql = "INSERT INTO students (roll, name, address) VALUES ($roll, '$name', '$address')";



			// Executing Query
			if($this->conn->query($sql) === TRUE){
					header("Location:index.php");
			}else{
				print_r("ERROR");
				exit();
			}


		}	

		public function find($id){

			// prepare statement
			$sql = "SELECT * FROM students WHERE id=" . $id;

			// Execute Query

			$student = $this->conn->query($sql);

			if($this->conn->error){
				print_r($this->conn->error);
				exit();
			}

			// Return student info 
			return $student;
		}

		public function update($id, $roll, $name, $address){

			// Escapes special characters in a string for use in an SQL statement
			$roll = mysqli_real_escape_string($this->conn, $roll);
			$name = mysqli_real_escape_string($this->conn, $name);
			$address = mysqli_real_escape_string($this->conn, $address);

			// Create Sql statement
			$sql = "UPDATE students set roll=$roll, name='$name', address='$address' WHERE id=$id";

		
			// Executing Query
			if($this->conn->query($sql) === TRUE){
					header("Location:index.php");
			}else{
				print_r($this->conn->error());
				exit();
			}

		}

		public function delete($id){

		// Create Sql statement

			$sql = "UPDATE students SET is_deleted=1 WHERE id=" . $id;

		// Executing Query
			if($this->conn->query($sql) === TRUE){
					header("Location:index.php");
			}else{
				print_r($this->conn->error());
				exit();
			}

		}


		public function recover($id){

		// Create Sql statement

			$sql = "UPDATE students SET is_deleted=0 WHERE id=" . $id;

		// Executing Query
			if($this->conn->query($sql) === TRUE){
					header("Location:index.php");
			}else{
				print_r($this->conn->error());
				exit();
			}

		}

			public function deletePermanant($id){

		// Create Sql statement

			$sql = "DELETE FROM students WHERE id=" . $id;

		// Executing Query
			if($this->conn->query($sql) === TRUE){
					header("Location:index.php");
			}else{
				print_r($this->conn->error());
				exit();
			}

		}
	}

?>