<?php

$new_task = filter_input(INPUT_POST, 'new_task', FILTER_SANITIZE_SPECIAL_CHARS);

var_dump($_POST);
