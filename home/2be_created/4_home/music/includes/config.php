<?php

	ob_start();
	session_start();

	$timezone = date_default_timezone_set("Europe/London");

	
	$url = parse_url(getenv("CLEARDB_DATABASE_URL"));
	/*
	$server = $url["host"];
	$username = $url["user"];
	$password = $url["pass"];
	$db = substr($url["path"], 1);
	
	require '../../_inc/functions.php';
	//$con = new mysqli($server, $username, $password, $db);
	*/

	$DATABASE_HOST = 'localhost';
	$DATABASE_USER = 'root';
	$DATABASE_PASS = '';
	
	$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, "spotify");

	if (mysqli_connect_errno()) {
		echo "Failed to connect: " . mysqli_connect_errno();
	}

?>
