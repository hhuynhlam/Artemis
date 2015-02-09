<?php

function connect_db() {
	$server = 'localhost'; // this may be an ip address instead
	$user = 'root';
	$pass = 'root';
	$database = 'apo_rho';
	$connection = new mysqli($server, $user, $pass, $database);

	return $connection;
}

$db = connect_db();
mysqli_set_charset($db, 'utf8');

?>