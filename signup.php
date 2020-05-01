<?php
	include'database/database.php';
	 session_start();
    $_SESSION['user']='';

	if (isset($_POST['signup']))
    {
		$username=$_POST['username'];
		$password=$_POST['password'];
        $_SESSION['user']=$username;
		$query="INSERT into users (username,password)
		       VALUES ('$username','$password')";
		$insert=mysqli_query($con,$query);

		header("location:home.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Log in</title>
	<link rel="stylesheet" type="text/css" href="Style/log.css">
</head>
<body>
	<div class="sign">

		<form class="sign_form" method="post">
			<label class="webname">ASKme</label>
			<br>
			<br>
			<br>
			<br>
			<br>
			<label class="sign_username">user name</label>
			<input class="nametext" type="text" name="username">
			<br>
			<br>
			<label class="sign_password">password</label>
			<input class="passtext" type="password" name="password">
			<br>
			<input class="sign_btu" type="submit" name="signup" value="sign up">
			

		</form>
		

	</div>

	

</body>
</html>