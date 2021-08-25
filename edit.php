<?php 
require 'model.php';
$id = $_GET['edit'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>To Do List application</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <div class="heading">
     	<h2>Update ToDo List</h2>
     </div>
     <form method="POST" action="controller.php?edit=<?php echo $id ?>" autocomplete="off">

     	<input type="text" name="task1" class="task_input" placeholder="Please enter text">
     	<button type="submit" class="button_input" name="submit">Update Task</button>

     </form>
     </div>	
</Body>
</html>