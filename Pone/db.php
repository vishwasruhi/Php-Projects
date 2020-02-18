<?php
class DB {
    protected $conn;
    public function __construct(){
        $this->conn=mysqli_connect("localhost","root","","myself");
    }

    public function index(){
        $sql="SELECT * FROM students";
        $users=mysqli_query($this->conn,$sql);
        
            // if(!$users)
            // {
            //     echo "error".mysqli_error($this->conn);
            //     exit();
            // }
        
        return $users ;
    }

    public function create($roll,$name,$address)
    {
        $roll=mysqli_real_escape_string($this->conn,$roll);
        $name=mysqli_real_escape_string($this->conn,$name);
        $address=mysqli_real_escape_string($this->conn,$address);
        //INSERTING DATA TO TABLE

        $sql="INSERT INTO students (roll,name,address) VALUES($roll,'$name','$address')";
        // echo $sql;
        // exit();
        if(mysqli_query($this->conn,$sql)===TRUE)
        {
            // exit();
            header('location:index.php');
            
        }
        else
        {
            print_r('error'.mysqli_error($this->conn));
            exit();
        }
    }
    public function find($id)
    {
        $sql="SELECT * FROM students WHERE id= " .$id;
        $users=mysqli_query($this->conn,$sql);
        if($this->conn->error)
        {
            print_r('error'.mysqli_error($this->conn));
            exit();
        }
        return $users;
    }
    public function update($id,$roll,$name,$address)
    {
        $roll=mysqli_real_escape_string($this->conn,$roll);
        $name=mysqli_real_escape_string($this->conn,$name);
        $address=mysqli_real_escape_string($this->conn,$address);
    
    $sql="UPDATE students set roll=$roll,name='$name',address='$address' WHERE id=$id";
    if(mysqli_query($this->conn,$sql)===TRUE)
    {
        header('location:index.php');
    }
    else
    {
        print_r('error'.mysqli_error($this->conn));
        exit();
    }

}
        public function delete($id)
        {
            $sql="DELETE FROM students WHERE id=$id";
            if(mysqli_query($this->conn,$sql)===TRUE)
            {
                header('location:index.php');
            }
            else
            {
                print_r('error'.mysqli_error($this->conn,$sql));
                exit();
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
}
?>