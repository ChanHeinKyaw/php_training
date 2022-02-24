<?php
session_start();
if (!isset($_SESSION['email'])) {
	header("Location:login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Home Page</title>
	<link rel="stylesheet" href="style.css">
	<style>
		.section {
			width: 80%;
			margin: 0 auto;
		}

		h1 {
			text-align: center;
			float: left;
		}

		.logout-btn {
			float: right;
			margin-top: 30px;
			color: #fff;
			background-color: #4CD195;
			padding: 5px 10px;
			border-radius: 5px;
			border: none;
			cursor: pointer;
			text-decoration: none;
		}
	</style>
</head>

<body>
	<div class="section">
		<h1>Welcome To Our Page</h1>
		<a href="logout.php" class="logout-btn clearfix">Logout</a>
	</div>
</body>

</html>