<?php
session_start();

if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];

	if ($username == "chanhein" && $password == "123123") {
		$_SESSION['username'] = $username;
		$_SESSION['password'] = $password;
		header("Location:member.php");
	} else {
		echo "You are not a valid user<br>";
	}
}
include "link.php";
?>

<h1>Index Page</h1>

<form action="<?php $_PHP_SELF ?>" method="POST">
	<input type="text" name="username" placeholder="Username"><br><br>
	<input type="password" name="password" placeholder="Password"><br><br>
	<button type="submit" name="submit">Login</button>
</form>