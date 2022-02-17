<?php
session_start();

if (isset($_POST["submit"])) {
	$username = $_POST["username"];
	$password = $_POST["password"];

	if ($username == "chanhein" && $password == "123123") {
		$_SESSION["username"] = $username;
		$_SESSION["password"] = $password;
		header("Location:member.php");
	} else {
		echo "You are not a valid user<br>";
	}
}
include "link.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tutorial 4</title>
</head>

<body>
	<h1>Index Page</h1>

	<form action="<?php $_PHP_SELF ?>" method="POST">
		<input type="text" name="username" placeholder="Username"><br><br>
		<input type="password" name="password" placeholder="Password"><br><br>
		<button type="submit" name="submit">Login</button>
	</form>
</body>

</html>