<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>QRCode Generator</title>
</head>

<body>
	<h1>QRCode Generator</h1>
	<form method="POST" autocomplete="off">
		<input type="text" class="form-control" name="text_code" placeholder="Test...">
		<button type="submit" name="generate">Generate</button>
	</form>
</body>

</html>

<?php
if (isset($_POST['generate'])) {
	if (!$_POST['text_code']) {
		echo "<span style='color:red;'>Pls Fill Text</span>";
	} else {
		$code = $_POST['text_code'];
		echo "
              <img src='https://chart.googleapis.com/chart?chs=200x200&cht=qr&chl=$code&choe=UTF-8'>
            ";
	}
}
?>