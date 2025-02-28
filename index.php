<?php
require_once 'function.php';
require_once 'database.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>To Do List</title>
	<link rel="stylesheet" href="./src/style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
	<main id="main">
		<form action="function.php" method="post">
			<label for="task_content">Ajouter une nouvelle tâche</label>
			<input type="text" name="task_content" id="task_content" required>

			<select name="task_status" id="task_status" required>
				<?php getAllStatus(); ?>
			</select>

			<input type="hidden" name="task_priority" value="0">
			<input type="checkbox" value="1" name="task_priority" id="task_priority">
			<label for="task_priority">Priority</label>

			<button type="submit">Ajouter</button>
		</form>

		<div id="list-task">
			<div class="card" style="width: 18rem;">
				<ul class="list-group list-group-flush">
					<?php getAllTask(); ?>
				</ul>
			</div>
		</div>
	</main>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>