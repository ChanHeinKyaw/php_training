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
	for ($row = 1; $row <= $num; $row++) {
		for ($col = 1; $col <= (2 * $num) - 1; $col++) {
			if ($col >= $num - ($row - 1) && $col <= $num + ($row - 1)) {
				echo "*";
			}else {
				echo "&nbsp;&nbsp;";
			}
		}
		echo "<br>";
	}
	for ($row = $num - 1; $row >= 1; $row--) {
		for ($col = 1; $col <= (2 * $num) - 1; $col++) {
			if ($col >= $num - ($row - 1) && $col <= $num + ($row - 1)) {
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