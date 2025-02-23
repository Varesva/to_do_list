<?php
require_once 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$hostname = $_ENV["DB_HOSTNAME"];
$username = $_ENV["DB_USERNAME"];
$password = $_ENV["DB_PASSWORD"];
$database = $_ENV["DB_NAME"];

// connection to db
$conn = mysqli_connect(
	$hostname,
	$username,
	$password,
	$database
);

if (mysqli_connect_errno()) {
	die("Failed to connect to database : " . mysqli_connect_error());
};
