<?php  

	require "./db.php";


	// Connecting to DB

	$db = new DB();

	// Fetch all students list


    $students = $db->index();
    
    echo gettype($students);
    exit();

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Index Page</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
	<div class="container">

		<div class="jumbotron center-text">
			<h1 align="center">All Users</h1>
			<div class="w-50 m-auto d-flex flex-row justify-content-around">
				
				<a href="create-user.php" class="btn btn-outline-info">Create User</a>
				<a href="deleted-user.php" class="btn btn-outline-danger">Recover User</a>
			</div>
			
		</div>
		<table class="table table-hover">
		  <thead>
		    <tr>
		      
		      <th scope="col">Roll</th>
		      <th scope="col">Name</th>
		      <th scope="col">Address</th>
		      <th scope="col">Edit</th>
		      <th scope="col">Delete</th>
		    </tr>
		  </thead>

			  	<?php if($students->num_rows > 0): ?>

					  <tbody>

					    
                        <?php for($i=0; $i < $students->num_rows ;$i++)
                        {

                          $row=mysqli_fetch_assoc($students);
					    <tr>
					        <td><?php echo $row['roll']; ?></td>
					        <td><?php echo $row['name']; ?></td>
					        <td><?php echo $row['address']; ?></td> 
					        <td><a href="edit-user.php?id=<?php echo $row['id']; ?>">Edit</a></td>
					        <td><a href="delete-user.php?id=<?php echo $row['id']; ?>">Delete</a></td>
					    </tr>
                        <?php endfor; ?>	

					  </tbody>

				<?php endif; ?>
		</table>
		
	</div>
</body>
</html>