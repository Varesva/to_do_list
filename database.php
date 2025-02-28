<?php
require_once 'vendor/autoload.php';

function conn(): bool|mysqli
{
	// load dotenv file
	$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
	$dotenv->load();
	// get connection param
	$hostname = $_ENV["DB_HOSTNAME"];
	$username = $_ENV["DB_USERNAME"];
	$password = $_ENV["DB_PASSWORD"];
	$database = $_ENV["DB_NAME"];
	// report errors
	mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
	// connection to db
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
	return $conn;
};

function addTask(string $task_content, int $task_status, string $task_priority): void
{
	$conn = conn();
	$sql = "INSERT INTO task (content, status_id, priority, date)
			VALUES (?, ?, ?, CURRENT_TIMESTAMP)";
	/* create a prepared statement */
	$stmt = mysqli_prepare($conn, $sql);
	// checking connection to db error
	if (! mysqli_stmt_prepare($stmt, $sql)) {
		die(mysqli_error($conn));
	};
	// sanitize values
	$task_content = mysqli_real_escape_string($conn, string: $task_content);
	$task_status = intval($task_status);
	$task_priority = mysqli_real_escape_string($conn, string: $task_priority);
	/* bind parameters to markers */
	mysqli_stmt_bind_param(
		$stmt,
		"sis",
		$task_content,
		$task_status,
		$task_priority,
	);
	// execute query
	mysqli_stmt_execute($stmt);
	// close connection
	mysqli_stmt_close($stmt);
	mysqli_close($conn);
	// redirect to main page
	header(header: 'Location: index.php');
};


function getAllStatus(): void
{
	$conn = conn();
	$sql = "SELECT * from status";
	// fetch data from db
	$result = mysqli_query($conn, $sql);

	while ($status = mysqli_fetch_assoc($result)) {
		$html = " <option value='%d'>%s</option> ";
		printf($html, intval($status["status_id"]), mysqli_real_escape_string($conn, $status["name"]));
	};
	mysqli_close($conn);
};

function getAllTask()
{
	$conn = conn();
	$sql = "SELECT content from task";
	// fetch data from db
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
		while ($task = mysqli_fetch_assoc($result)) {
			$html = "<li class='list-group-item'>%s</li>";
			printf($html, mysqli_real_escape_string($conn, $task["content"]));
		};
	} else {
		echo 'Aucune tâche à effectuer.';
	};
	mysqli_close($conn);
};
