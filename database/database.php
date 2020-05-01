<?php
	$con=mysqli_connect('localhost','root','root','ask_me');

	if(mysqli_connect_errno())
	{
		echo "Your connection is failed".mysqli_connect_errno();
	}
	
?>