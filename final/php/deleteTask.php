<?php

function deleteTask($taskID) {

  $db_connection = new mysqli('stardock.cs.virginia.edu', 'cs4720ew7wc', 'june291993', 'cs4720ew7wc');
  if (mysqli_connect_errno()) {
    echo "Connection Error!";
    return;
  }

  //echo "Connection made!";
  //echo $taskID;
  $stmt = $db_connection->stmt_init();
  if($stmt->prepare("delete FROM `taskNotesTable` WHERE taskID=$taskID")) {
    $stmt->execute();
     //echo $taskID;
  }


  $stmt = $db_connection->stmt_init();
  if($stmt->prepare("delete FROM `userTasksTable` WHERE taskID=$taskID")) {
    $stmt->execute();
     //echo $taskID;
  }
}

$getTaskID = $_GET["taskID"];
deleteTask((int) $getTaskID);

?>