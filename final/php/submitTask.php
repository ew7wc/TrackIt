<?php
include 'getTasks.php';
function addNewTaskToDb($userID, $taskName, $dateCompletedBy, $timeOnDate, $priorityLvl, $taskType, $status, $notes) {

  /*$parseDueTime = explode(":", $timeOnDate);
  $dueDate = new DateTime($dateCompletedBy);
  $dueDate = $dueDate->setTime($parseDueTime[0], $parseDueTime[1]);
  echo "$dueDate"; */
  //DATABASE CONNECTION!
  $db_connection = new mysqli('stardock.cs.virginia.edu', 'cs4720ew7wc', 'june291993', 'cs4720ew7wc');
  if (mysqli_connect_errno()) {
    echo "Connection Error!";
    return;
  }
  $task_ID; 
  //echo "Connection made!";
  //echo "<p> HELLO $taskName $dateCompletedBy $timeOnDate $priorityLvl $taskType $status $notes </p>";
//RETURNING name_of_primary_key_column INTO :bind_variable
  $stmt = $db_connection->stmt_init();
  if($stmt->prepare("INSERT INTO `userTasksTable` (userID, taskName, priority, timeDue, dateDue, typeTask, status) VALUES ($userID,'$taskName', '$priorityLvl', '$timeOnDate', '$dateCompletedBy', '$taskType', '$status')")) {
    //$stmt->bind_param("sissss", $taskName, $dateCompletedBy, $timeOnDate, $priorityLvl, $taskType, $status);
    $stmt->bind_param("isissss", $userID, $taskName, $priorityLvl, $timeOnDate, $dateCompletedBy, $taskType, $status);
    $stmt->execute();

    //echo "inserted a task";
  } 
   $taskIDinserted = $stmt->insert_id;
   //echo "$taskIDinserted";
  if($stmt->prepare("INSERT INTO `taskNotesTable` (taskID, notes) VALUES ($taskIDinserted,'$notes')")) {
    //$stmt->bind_param("sissss", $taskName, $dateCompletedBy, $timeOnDate, $priorityLvl, $taskType, $status);
    $stmt->bind_param("is", $taskIDnum, $notes);
    $stmt->execute();
    //echo "inserted a note";
   // echo "inserted taskID: $taskIDnum with notes $notes";
  } 


  
  $stmt = $db_connection->stmt_init();
  if($stmt->prepare("select * FROM `userTasksTable` WHERE userID=$userID AND status='$taskStatus'")) {
    $stmt->bind_param("ss", $userEmail, $taskStatus);
    $stmt->execute();
    $stmt->bind_result($userID, $taskID, $taskName, $priority, $timeDue, $dateDue, $typeTask, $status);

    while($stmt->fetch()) {
      echo("<li id=$taskID>" . $taskName . "<br>Due: " . date('Y-m-d', strtotime($dateDue)) . "</li>\n");
    }

  }

  mysql_close($db_connection);

} 


$taskName = $_GET['inputTaskName'];
$dueDate = $_GET['inputCompletionDate'];
$dueTime = $_GET['inputTimeDue'];
$priority = $_GET['priorities'];
$typeTask = $_GET['typeTaskSelected'];
$status = $_GET['inputStatus'];
$notes = $_GET['inputNotes'];
$userID = $_GET['userID'];
//echo "hello";

/*echo "Task name: $taskName  Due Date: $dueDate  Time due: $dueTime   Priority: $priority  Type of Task: $typeTask  Status: $status  Notes: $notes"; */


addNewTaskToDb((int)$userID, $taskName, $dueDate, $dueTime, $priority, $typeTask, $status, $notes); 
//addNewTaskToDb($taskName, $dateCompletedBy, $timeOnDate, $priorityLvl, $taskType, $status, $notes)
?>