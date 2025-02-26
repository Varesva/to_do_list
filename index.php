<?php
// require_once 'function.php';
require_once 'database.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>To Do List</title>
	<link rel="stylesheet" href="style.css">
</head>

<body>
	<main id="main">
		<form action="function.php" method="post">
			<label for="task_content">Ajouter une nouvelle tâche</label>
			<input type="text" name="task_content" id="task_content" required>

			<select name="task_status" id="task_status">
				<?php getStatus($conn); ?>
			</select>

			<input type="checkbox" value="1" name="task_priority" id="task_priority">
			<label for="task_priority">Priority</label>

			<button type="submit">Ajouter</button>
		</form>
	</main>

</body>

</html>