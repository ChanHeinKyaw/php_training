<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tutorial 1</title>
</head>

<body>
	<table style="margin: 0 auto; border:5px solid #000;">
		<?php
		const num = 8;
		for ($row = 1; $row <= num; $row++) {
			echo "<tr>";
			for ($col = 1; $col <= num; $col++) {
				$total = $row + $col;
				if ($total % 2 == 0) {
					echo "<td style='width:60px; height:60px; background-color:#fff'></td>";
				} else {
					echo "<td style='width:60px; height:60px; background-color:#000'></td>";
				}
			}
			echo "</tr>";
		}
		?>
	</table>
</body>
</html>