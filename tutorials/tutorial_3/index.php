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
	<link rel="stylesheet" type="text/css" href="css/date-picker.css" />
</head>

<body>

	<form action="<?php $_PHP_SELF ?>" method="POST">
		<br>
		<input type="text" name="datePicker" class="datePicker" style="text-align: center; width:100px" value="<?php echo $date; ?>">
		<button type="submit" name="submit">Submit</button>
	</form>


	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/moment.min.js"></script>
	<script type="text/javascript" src="js/date-picker.min.js"></script>
	<script>
		$('.datePicker').daterangepicker({
			"singleDatePicker": true,
			"autoApply": true,
			"showDropdowns": true,
			"maxDate": moment(),
			"locale": {
				"format": "DD-MM-YYYY",
			}
		});
	</script>
</body>

</html>