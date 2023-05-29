<?php
	$conn = mysqli_connect('localhost', 'root', 'MySQL@123#');

	if (!$conn)
	{
		die("Database Connection Failed" . mysqli_error());
	}

	$select_db = mysqli_select_db($conn,'payroll');
	if (!$select_db)
	{
		die("Database Selection Failed" . mysqli_error());
	}
?>