<?php

	$con=mysqli_connect("localhost", "root", null) or die(mysqli_error($con));

	mysqli_query($con, "CREATE DATABASE userdatabase1");
    mysqli_query($con, "USE userdatabase1");

    mysqli_query($con, "create table user(username varchar(30) primary key, password varchar(30) not null, email varchar(30) not null, otp varchar(30));" );

	if($con)
	{
		echo "<h3>connection okay</h3>";
	}
	else
	{
		die("connection failed ");
	}
?>