<?php


function updateTaskStatus($taskID, $status) {
	$db_connection = new mysqli('stardock.cs.virginia.edu', 'cs4720ew7wc', 'june291993', 'cs4720ew7wc');
	if (mysqli_connect_errno()) {
		echo "Connection Error!";
		return;
	}

	$stmt = $db_connection->stmt_init();
	if($stmt->prepare("UPDATE `userTasksTable` SET status='$status' WHERE taskID=$taskID")) {
		$stmt->bind_param("is", $taskID, $status);
		$stmt->execute();
        //echo "updated $taskID";
	} 
}

$taskID = $_GET['taskID'];
$destinationCol = $_GET['dragIntoWhatColumn'];
//echo "Task ID: $taskID moving to: $destinationCol";
updateTaskStatus($taskID, $destinationCol);

?>