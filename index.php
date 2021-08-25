
<?php 
require 'model.php';

 ?>
<!DOCTYPE html>
<html>
<head>
     <title>To Do List application</title>
     <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <div class="heading">
          <h2>ToDo List</h2>
     </div>

    <?php
    // Message display for new task
     if (isset($_GET['mess'])) {
        if($_GET['mess']=='success'){
          echo "successfully created";
        }elseif($_GET['mess']=='ereror'){
          echo "<div class='error'>error to create</div>";
        }
        //Message for delete task
        if($_GET['mess']=='deleted'){
          echo "Successfully deleted";
        }elseif($_GET['mess']=='notdeleted'){
          echo "unable to delete";
        }
        // Message  display for update task
        if($_GET['mess']=='updated'){
          echo "Successfully updated";
        }elseif($_GET['mess']=='notupdated'){
          echo "unable to update";
        }
     }
      ?> 
     
      <form method="POST" action="controller.php" autocomplete="off">

      <?php if(isset($_GET['mess']) && $_GET['mess'] == 'error') {?>
          <input type="text" name="task" class="task_input" placeholder="Field cannot be empty" style="border-color: #ff6666">
          <button type="submit" class="button_input" name="submit">Add Task</button>

      <?php } else{ ?>
          <input type="text" name="task" class="task_input" placeholder="Please enter your task">
          <button type="submit" class="button_input" name="submit">Add Task</button>
      <?php } ?>

     </form>
     </div>    
<?php 
   $todos=$conn->query("SELECT * FROM todos ORDER BY checked ASC");
 ?>
     <table>   
          <thead>
            <tr>
               <th>Select Item</th>
               <th>Name of the item</th>
               <th>Date created</th>
               <th>Date modified</th>
               <th></th>
               <th></th>
           </tr>
          </thead>
          <tbody>
               
               <?php while ($todo = $todos->fetch(PDO::FETCH_ASSOC)) { ?>
                 <tr>
                     <?php if($todo['checked']) { ?>
                    <td name="check">
                          <input type="checkbox" checked="checked" onchange="javascript:document.location = 'controller.php?uncheck=<?php echo $todo['id']; ?>'">
                    </td>
                    
                    <td class="checked" align="center"><?php echo $todo['task'] ?></td>
                    <td><?php echo $todo['date_time'] ?></td>
                    <td><?php echo $todo['modified'] ?></td>
                    <td class="delete"><a href="controller.php?delete=<?php echo $todo['id']; ?>">Delete</a></td>
                    <td class="edit" name="edit"><a href="edit.php?edit=<?php echo $todo['id']; ?>">Edit</a></td>
                   <?php }  else {?>

                    <td name="check">
                          <input type="checkbox" onchange="javascript:document.location = 'controller.php?check=<?php echo $todo['id']; ?>'">
                    </td>
                       
                       <td align="center"><?php echo $todo['task'] ?></td>
                       <td><?php echo $todo['date_time'] ?></td>
                       <td><?php echo $todo['modified'] ?></td>
                       <td class="delete"><a href="controller.php?delete=<?php echo $todo['id']; ?>">Delete</a></td>
                       <td class="edit" name="edit" ><a href="edit.php?edit=<?php echo $todo['id']; ?>">Edit</a></td>
                   <?php } ?>
                 </tr>
               <?php } ?>
          </tbody>
     </table>
</body>
</html>

 