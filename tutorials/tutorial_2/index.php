<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tutorial 2</title>
</head>
<style>
	* {
		text-align: center;
	}
</style>

<body>

<?php
	$num = 6;
	for ($col = 1; $col <= $num; $col++) {
		for ($row = 1; $row <= (2 * $num) - 1; $row++) {
			if ($row >= $num - ($col - 1) && $row <= $num + ($col - 1)) {
				echo "*";
			}else {
				echo "&nbsp;&nbsp;";
			}
		}
		echo "<br>";
	}
	for ($col = $num - 1; $col >= 1; $col--) {
		for ($row = 1; $row <= (2 * $num) - 1; $row++) {
			if ($row >= $num - ($col - 1) && $row <= $num + ($col - 1)) {
				echo "*";
			} else {
				echo "&nbsp;&nbsp;";
			}
		}
		echo "<br>";
	}
	?>
</body>

</html>