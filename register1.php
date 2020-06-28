<!DOCTYPE html>
<html>
<head>
	<style>
	* {
  box-sizing: border-box;
}

input[type=text], select, textarea {
  width: 70%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #4CAF50;
  color: black;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}


.row:after {
  content: "";
  display: table;
  clear: both;
}
</style>
</head>
<body>
	<?php
	require 'connection1.php';
	?>
	<div class="container">
	<form action="" method="POST" align="center">
		<div class="row">
		<div class="col-25">
		<label>User Name</label>
		</div>
      <div class="col-75">
		<input type="text" name="name" required>
		  </div>
       </div>
		<br>
		<br>
		<div class="row">
		<div class="col-25">
		<label>PassWord</label>
		</div>
      <div class="col-75">
		<input type="text" name="password" required>
		 </div>
       </div>
		    <br>
			<br>
		<div class="row">
		<div class="col-25">
		<label>Email</label>
		</div>
      <div class="col-75">
		<input type="text" name="email" required>
		</div>
       </div>
		    <br>
			<br>
		<input type="submit" name="btn">
		<br>
		<br>
	</form>
</div>
<?php
	if($_POST["btn"])
	{
		$name=$_POST['name'];
		$password=$_POST['password'];
		// $password=md5($password);
		$email=$_POST['email'];

		$query="insert into user (username,password,email) values('$name','$password','$email')";
		$success=mysqli_query($con,$query);
		if($success)
		{
			echo "Registerd";
		}
		else
		{
			echo "Eroor Occured";
		}
	}
?>
</body>
</html>