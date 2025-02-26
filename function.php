<?php
// require_once 'database.php';

function addTask($database)
{
	$task_content = filter_input(INPUT_POST, 'task_content', FILTER_SANITIZE_SPECIAL_CHARS);
	$task_status = $_POST['task_status'];
	$task_priority = $_POST['task_priority'];
};
