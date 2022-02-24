<?php
session_start();
include "connect.php";
if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = $_POST['password'];
	$hash_password = md5($password);

	$query = "SELECT * FROM users WHERE email='$email' && password='$hash_password'";

	$result = mysqli_query($db, $query);

	$row = mysqli_fetch_array($result);

	if (is_array($row)) {
		$_SESSION['email'] = $row['email'];
		$_SESSION['password'] = $row['password'];
		header("Location:welcome.php");
	} else {
		echo "<script>alert('Invalid Email and Password')</script>";
	}
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login Page</title>
	<link rel="stylesheet" href="style.css">
	<style>
		.card {
			text-align: left !important;
		}
	</style>
</head>

<body>
	<div class="card">
		<form action="" method="POST">
			<input type="text" name="email" placeholder="Email"><br><br>
			<input type="password" name="password" placeholder="Password"><br>
			<button type="submit" name="submit">Login</button>
		</form><br>
		<a href="forgot_password.html">Forgot Password</a>
	</div>
</body>

</html>