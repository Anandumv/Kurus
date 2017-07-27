<?php
	
	session_start();

	$connect=mysqli_connect("localhost","root","") or die("Couldn't connect to the database!");
		mysqli_select_db($connect,"mp_kuru") or die("Couldn't find database");

	$fname=$_POST["fname"];
	$mname=$_POST["mname"];
	$lname=$_POST["lname"];
	$email=$_POST["email"];
	$username=$_POST["username"];
	$password=$_POST["password"];
		
		$query= mysqli_query($connect,"INSERT INTO users (fname,mname,lname,email,username,password) VALUES ('$fname','$mname','$lname','$email','$username','$password');");

		//header("Location:../modules/home_view_imp.php");
		include 'user.html';
?>