<?php

function lookupTasks($taskStatus, $userID) {

  $db_connection = new mysqli('stardock.cs.virginia.edu', 'cs4720ew7wc', 'june291993', 'cs4720ew7wc');
  if (mysqli_connect_errno()) {
    echo "Connection Error!";
    return;
  }

  //echo "Connection made!";

  $stmt = $db_connection->stmt_init();
  if($stmt->prepare("select * FROM `userTasksTable` WHERE userID=$userID AND status='$taskStatus'")) {
    $stmt->bind_param("ss", $userEmail, $taskStatus);
    $stmt->execute();
    $stmt->bind_result($userID, $taskID, $taskName, $priority, $timeDue, $dateDue, $typeTask, $status);

    while($stmt->fetch()) {
      echo("<li id=$taskID>" . $taskName . "<br>Due: " . date('Y-m-d', strtotime($dateDue)) . "<button type=\"button\" class=\"btn btn-default btn-xs\" id=\"sortBtn\">
  <span class=\"glyphicon glyphicon-trash\"></span></button></li>\n");

    }

  }
}

$getStatus = $_GET["taskStatus"];
$getUserID = $_GET["userID"];
lookupTasks($getStatus, (int) $getUserID);

?>