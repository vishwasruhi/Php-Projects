<?php

 require "./db.php";
 $db=new DB();

 $email=$_POST['email'];
 $password=$_POST['password'];

 $users=$db->index($email,$password);
 echo "VALID USERS".$users;
 if($users==$email and $users==$password)
 	echo "valid user";
 else
 	echo "invalid user";
?>