<?php
	include'database/database.php';
    session_start();
    $_SESSION['user']='';

	if (isset($_POST['login']))
    {   
		$username=$_POST['username'];
		$password=$_POST['password'];

		$query="SELECT * FROM users";
		$result=mysqli_query($con,$query);
		$result=mysqli_fetch_all($result,MYSQLI_ASSOC);

		foreach ($result as $user)
		 {
			if ($username==$user['username'] && $password==$user['password'])
			{
				header("location:home.php?user=$username");
				$_SESSION['user']=$user['username'];
			}
			else 
			{
				echo "wrong username!";
			}
		}
	}



?>

<!DOCTYPE html>
<html>
<head>
	<title>Log in</title>
	<link rel="stylesheet" type="text/css" href="Style/log.css">
</head>
<body>
	<div class="asd">

		<form class="login_form" method="post">
			<label class="webname">ASKme</label>
			<br>
			<br>
			<br>
			<br>
			<br>
			<label class="username">user name</label>
			<input class="nametext" type="text" name="username">
			<br>
			<br>
			<label class="password">password</label>
			<input class="passtext" type="password" name="password">
			<br>
			<input class="login_btu" type="submit" name="login" value="log in">
			<br>
			<br>
			<br>
			<br>
			<label >Don’t have an account yet?<a href="signup.php">Sign up</a></label>

		</form>
		

	</div>

	

</body>
</html>