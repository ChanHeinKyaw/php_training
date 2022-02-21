<!DOCTYPE html>
<html lang="en">

<head>
	<title>QR Code Generator</title>
	<style>
		body {
			text-align: center;
		}
	</style>
</head>

<body>
	<form autocomplete="off" action="<?php $_PHP_SELF ?>" method="post">
		<h1>Create QR Code</h1>
		<input type="text" name="qr_code">
		<button type="submit" name="btnsubmit">Generate QR Code</button>
	</form>

	<?php
	include "phpqrcode/qrlib.php";
	$path = "img/";
	if (!file_exists($path)) {
		mkdir($path);
	}

	$filename = "";

	if (isset($_POST["btnsubmit"])) {

		$codeString = $_POST["qr_code"];

		if (empty($codeString)) {
			echo "<span style='color:red;'>QR Code Field Is Required</span>";
		} else {
			$filename = $path . md5($codeString) . ".png";

			QRcode::png($codeString, $filename);

			echo '<img src="' . $path . basename($filename) . '" /><hr/>';
		}
	}

	?>

</body>

</html>