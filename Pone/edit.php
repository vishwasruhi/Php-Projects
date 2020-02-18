<?php
require "./db.php";
$db=new DB();
$id=$_POST['id'];
$roll=$_POST['roll'];
$name=$_POST['name'];
$address=$_POST['address'];
$db->update($id,$roll,$name,$address);
header('location:index.php');
?>