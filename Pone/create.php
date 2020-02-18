<?php
require "./db.php";
$db= new DB();
$roll=$_POST['roll'];
$name=$_POST['name'];
$address=$_POST['address'];
$user=$db->create($roll,$name,$address);
header("Location:index.php");
?>