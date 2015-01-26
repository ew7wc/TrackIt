<?php


function getPercentCompletedTasks($userID) {
	$db_connection = new mysqli('stardock.cs.virginia.edu', 'cs4720ew7wc', 'june291993', 'cs4720ew7wc');
	if (mysqli_connect_errno()) {
		echo "Connection Error!";
		return;
	}
	//echo" connection made";
	$numCompleted = 0;
	$stmt = $db_connection->stmt_init();
	if($stmt->prepare("select count(*) from userTasksTable where userID=$userID and status='completed'")) {
		$stmt->execute();
        $stmt->bind_result($completed);
        $stmt->fetch();
        //$numCompleted = $completed;
        //echo "$completed";
        $numCompleted = $completed;
	}
	$stmt = $db_connection->stmt_init();
	$totalNum = 0;
	if($stmt->prepare("select count(*) from userTasksTable where userID=$userID")) {
		$stmt->execute();
        $stmt->bind_result($total);
        $stmt->fetch();
        $totalNum = $total;
	}  
	echo $numCompleted/$totalNum * 100;
}

$userID = $_GET['userID'];

getPercentCompletedTasks($userID);

?>