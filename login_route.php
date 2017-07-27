<?php
	session_start();
	$username=$_POST['username'];
	$password=$_POST['password'];

	if($username&&$password)
	{
		$connect=mysqli_connect("localhost","root","") or die("Couldn't connect to the database!");
		mysqli_select_db($connect,"mp_kuru") or die("Couldn't find database");

		$query= mysqli_query($connect,"SELECT * FROM users WHERE username='$username'");
        
		$numrows = mysqli_num_rows($query);

		if($numrows!==0)
		{
			while($row = mysqli_fetch_assoc($query))
			{
				$fname = $row['fname'];
                $lname = $row['lname'];
				$dbusername = $row['username'];
				$dbpassword = $row['password'];
                
			}
			if($username==$dbusername&&$password==$dbpassword)
			{
                
				$_SESSION['first_name']=$fname;
                $_SESSION['last_name']=$lname;                
                $_SESSION['username']=$dbusername;
                $_SESSION['password']=$dbpassword;
                header('Location:user.html');
			}
			else
				echo "Your password is incorrect!";
		}
		else
			die("That user didn't exist!");	
	}
	else
		die("Please enter a username and password!");
?>
