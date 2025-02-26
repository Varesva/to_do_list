<?php
require_once 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// connection to db
$hostname = $_ENV["DB_HOSTNAME"];
$username = $_ENV["DB_USERNAME"];
$password = $_ENV["DB_PASSWORD"];
$database = $_ENV["DB_NAME"];

$conn = mysqli_connect(
	$hostname,
	$username,
	$password,
	$database
);

// error checking
if (mysqli_connect_errno()) {
	die("Failed to connect to database : " . mysqli_connect_error());
};


function addTask($db)
{
	$sql = "INSERT INTO task (content, status_id, priority, date)
			VALUES (?, ?, ?, CURRENT_TIMESTAMP)";

	/* create a prepared statement */
	$stmt = mysqli_stmt_init($db);
	// checking connection to db error
	if (! mysqli_stmt_prepare($stmt, $sql)) {
		die(mysqli_error($db));
	};

	/* bind parameters for markers */
	mysqli_stmt_bind_param(
		$stmt,
		"sii",
		$task_content,
		$task_status,
		$task_priority,
	);

	mysqli_stmt_execute($stmt);
	mysqli_close($db);
};


// fetch names of statuses
function getStatus($db)
{
	$sql = "SELECT * from status";
	$data = mysqli_query($db, $sql);

	if (mysqli_num_rows($data) > 0) {
		while ($status = mysqli_fetch_assoc($data)) {
			$html = " <option value='%d'>%s</option> ";
			printf($html, $status["status_id"], $status["name"]);
		};
	};
	mysqli_close($db);
};
