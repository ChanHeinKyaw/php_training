<?php
session_start();
if (!isset($_SESSION['username'])) {
	header("Location:index.php");
}
include "link.php";
?>

<h1>Member Page</h1>