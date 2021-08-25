<?php 
require 'model.php';

/*
 * Insert task into database
 */
if (isset($_POST['task']))
{
  $task = $_POST['task'];

  if (empty($task)) {
    header("Location: index.php?mess=error");
  } else {

    $insert = $conn->prepare("INSERT INTO todos(task) VALUE(?)");
    $res = $insert->execute([$task]);

    if ($res) {
            header("Location: index.php?mess=success");
        } else {
            header("Location: index.php");
        }
        $conn = null;
        exit();
    }
}
else {
    header("Location: index.php?mess=error"); 
}

/*
 * Delete task from database
 */
if (isset($_GET['delete']))
{
  $id = $_GET['delete'];

  if (empty($id)) {
    echo 0;
  } else {

          $insert = $conn->prepare("DELETE FROM todos WHERE id=?");
          $res = $insert->execute([$id]);

         if($res){
                 header("Location: index.php?mess=deleted");
            }  else{
              header("Location: index.php?mess=notdeleted");
            }

            $conn = null;
            exit();

    }

   }

   // Update task from database

if(isset($_POST['task1'])){
   $id = $_GET['edit'];

   if(isset($_POST['task1'])){
      $task = $_POST['task1'];
      $insert = $conn->prepare("UPDATE todos SET task=? WHERE id=?");
      $res = $insert->execute([$task, $id]);
        if($res){
           header("Location: index.php?mess=updated");
        } else{
            header("Location: index.php?mess=notupdated");
        }
    
    }
 }


/*
 * Change value of checkbox
 */
if (isset($_GET['check']))
{
  $check = $_GET['check'];

    $insert = $conn->prepare("UPDATE todos SET checked=1 WHERE id=?");
    $res = $insert->execute([$check]);
    if ($res) {
        header("Location: index.php");
    } else {
      header("Location: index.php?mess=checkerror");
    }
}

/*
 * Change value of checkbox
 */
if (isset($_GET['uncheck']))
{
  $uncheck = $_GET['uncheck'];

    $insert = $conn->prepare("UPDATE todos SET checked=0 WHERE id=?");
    $res = $insert->execute([$uncheck]);
    if ($res) {
        header("Location: index.php");
    } else {
      header("Location: index.php?mess=uncheckerror");
    }
}




