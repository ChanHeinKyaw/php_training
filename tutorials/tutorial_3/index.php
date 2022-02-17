<?php
if (isset($_POST['submit'])) {
	$date = $_POST['datePicker'];

	$currentDate = date("d-m-Y");

	$age = date_diff(date_create($date), date_create($currentDate));

	echo "Current age is " . $age->format("%d") . "(Days) " . $age->format("%m") . "(Month) " . $age->format("%y") . "(Year)";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tutorial 3</title>
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
</head>

<body>

	<form action="<?php $_PHP_SELF ?>" method="POST">
		<br>
		<input type="text" name="datePicker" class="datePicker" style="text-align: center; width:100px">
		<button type="submit" name="submit">Submit</button>
	</form>


	<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
	<script>
		$('.datePicker').daterangepicker({
			"startDate": "01/01/1990",
			"endDate": "01/31/2022",
			"singleDatePicker": true,
			"autoApply": true,
			"showDropdowns": true,
			"locale": {
				"format": "DD-MM-YYYY",
			}
		});
	</script>
</body>

</html>