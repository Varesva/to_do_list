<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>To Do List</title>
	<link rel="stylesheet" href="style.css">
</head>

<body>
	<table>
		<thead>
			<tr>
				<th scope="col" id="col_todo">À faire</th>
				<th scope="col" id="col_doing">En cours</th>
				<th scope="col" id="col_done">Terminé</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td id="row_todo"></td>
				<td id="row_doing"></td>
				<td id="row_done"></td>
			</tr>
		</tbody>
	</table>

	<form action="function.php" method="post">
		<label for="new_task">Ajouter une nouvelle tâche</label>
		<input type="text" name="new_task" id="new_task">

		<select name="task_status" id="task_status">
			<option value="todo" selected>À faire</option>
			<option value="doing">En cours</option>
			<option value="done">Terminé</option>
		</select>

		<input type="checkbox" value="1" name="task_priority" id="task_priority">
		<label for="task_priority">Priority</label>

		<button type="submit">Ajouter</button>
	</form>


</body>

</html>