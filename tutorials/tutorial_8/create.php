<?php
session_start();
require "connect.php";

$name = "";
$email = "";
$phone = "";
$month = "";
$password = "";
$address = "";

$nameError = "";
$emailError = "";
$phoneError = "";
$monthError = "";
$passwordError = "";
$addressError = "";

if (isset($_POST["create-btn"])) {
	$name = $_POST["name"];
	$email = $_POST["email"];
	$phone = $_POST["phone"];
	$month = $_POST["month"];
	$password = $_POST["password"];
	$address = $_POST["address"];

	$hash_password = md5($password);

	if (empty($name)) {
		$nameError = "The name field is required.";
	}

	if (empty($email)) {
		$emailError = "The email field is required.";
	}

	if (empty($phone)) {
		$phoneError = "The phone field is required.";
	}

	if (empty($month)) {
		$monthError = "The Month field is required.";
	}

	if (empty($password)) {
		$passwordError = "The password field is required.";
	}

	if (empty($address)) {
		$addressError = "The address field is required.";
	}


	if (!empty($name) && !empty($email) && !empty($phone) && !empty($password) && !empty($address)) {
		$query = "INSERT INTO users(name,email,phone,password,address,month) VALUES ('$name','$email','$phone','$hash_password','$address')";
		mysqli_query($db, $query);
		$_SESSION['successMsg'] = "User Successfully Created";
		header("Location:index.php");
	}
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>User Create Page</title>
	<link rel="stylesheet" href="style.css">
</head>

<body>
	<div class="card">
		<div class="user-create clearfix">
			<h2>User Create</h2>
			<a href="index.php">
				<< Back</a>
		</div>
		<form action="<?php $_PHP_SELF ?>" method="POST">

			<input type="text" name="name" placeholder="Name" value="<?php echo $name; ?>">
			<span style="color: red;"><?php echo $nameError ?></span><br><br>

			<input type="email" name="email" placeholder="Email" value="<?php echo $email; ?>">
			<span style="color: red;"><?php echo $emailError ?></span><br><br>

			<input type="number" name="phone" placeholder="Phone" value="<?php echo $phone; ?>">
			<span style="color: red;"><?php echo $phoneError ?></span><br><br>

			<select name="month">
				<option value="">Select Month</option>
				<option value="jan">JAN</option>
				<option value="feb">FEB</option>
				<option value="mar">MAR</option>
				<option value="apr">APR</option>
				<option value="may">MAY</option>
				<option value="jun">JUN</option>
				<option value="jul">JUL</option>
				<option value="aug">AUG</option>
				<option value="sep">SEP</option>
				<option value="oct">OCT</option>
				<option value="nov">NOV</option>
				<option value="dec">DEC</option>
			</select>
			<span style="color: red;"><?php echo $monthError ?></span><br><br>

			<input type="password" name="password" placeholder="Password" value="<?php echo $password; ?>">
			<span style="color: red;"><?php echo $passwordError ?></span><br><br>

			<textarea name="address" placeholder="Address....." rows="5"><?php echo $address; ?></textarea>
			<span style="color: red;"><?php echo $addressError ?></span>

			<button type="submit" name="create-btn">Submit</button>

		</form>
	</div>
</body>

</html>