<?php
require_once 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
	$task_content = filter_input(INPUT_POST, 'task_content', FILTER_SANITIZE_SPECIAL_CHARS);

	$task_status = filter_input(INPUT_POST, $_POST['task_status'], FILTER_SANITIZE_NUMBER_INT);

	$task_priority = filter_input(INPUT_POST, $_POST['task_priority'], FILTER_SANITIZE_NUMBER_INT);

	if (!empty($task_content) && $task_content != " ") {

		addTask($conn, $task_content, $task_status, $task_priority);
	};
};

header('Location: index.php');
