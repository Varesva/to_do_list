<?php

$new_task = filter_input(INPUT_POST, 'new_task', FILTER_SANITIZE_SPECIAL_CHARS);
$new_status = $_POST['task_status'];
$date = new DateTime();
$date = $date->format('d/m/Y H:i:s');
$priority = $_POST['task_priority'];
