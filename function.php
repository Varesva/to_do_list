<?php
require_once 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$task_content = filter_input(INPUT_POST, 'task_content', FILTER_SANITIZE_SPECIAL_CHARS);

	$task_status = intval($_POST['task_status']);

	$task_priority = htmlspecialchars($_POST['task_priority']);

	if (!empty($task_content) && $task_content != " ") {
		addTask(
			$task_content,
			$task_status,
			$task_priority
		);
	};
};
