<?php
require "./db.php";

$db=new DB();
$id=$_GET['id'];
$student= $db->find($id);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Edit User</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
	
	<div class="container center-text p-5">
		<div class="w-50 m-auto p-5 m-5 shadow-lg p-3 mb-5 bg-white rounded">
			<h1 align="center">Edit User</h1>
			<form action="edit.php" method="POST">
				  <div class="form-group">
				    <label>Roll</label>
				    <input type="hidden" name="id" value="<?php echo $student['id'] ?>">
				    <input type="text" class="form-control" name="roll" value=" <?php echo $student['roll'] ?> " required autofocus>
				  </div>
				   <div class="form-group">
				    <label>Name</label>
				    <input type="text" class="form-control" name="name" value=" <?php echo $student['name'] ?> " required autofocus>
				  </div>
				   <div class="form-group">
				    <label>Address</label>
				    <input type="text" class="form-control" name="address" value=" <?php echo $student['address'] ?> " required autofocus>
				  </div>
				  <button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
	</div>

</body>
</html>