<?php
  $getUserID = (int) $_GET["userID"];
  //DATABASE CONNECTION!
  $db_connection = new mysqli('stardock.cs.virginia.edu', 'cs4720ew7wc', 'june291993', 'cs4720ew7wc');
  if (mysqli_connect_errno()) {
    echo "Connection Error!";
    return;
  }

  //echo "Connection made!";

  $stmt = $db_connection->stmt_init();
  if($stmt->prepare("select * FROM `userTasksTable`,`taskNotesTable` WHERE userID = $getUserID AND userTasksTable.taskID = taskNotesTable.taskID AND status<>'completed' order by dateDue asc")) {
     
      $stmt->execute();
      $stmt->bind_result($userID, $taskID, $taskName, $priority, $timeDue, $dateDue, $typeTask, $status, $taskID, $notes, $notesID);

      echo "<table class=\"table\">";
      echo "<tr><th>Task Name:</th><th>Priority:</th><th>Time Due:</th><th>Date due:</th><th>Type of Task:</th><th>Status:</th><th>Notes:</th></tr>";
      while($stmt->fetch()) {
          echo "<tr>";
          echo("<td>" . $taskName . "   </td>\n");
          echo("<td>" . $priority . "   </td>\n");
          echo("<td>" . $timeDue . "   </td>\n");
          echo("<td>" . date('Y-m-d', strtotime($dateDue)) . "</td>\n");
          echo("<td>" . $typeTask . "   </td>\n");
          echo("<td>" . $status . "   </td>\n");
          echo("<td>" . $notes . "   </td>\n");
          echo "</tr>";
      }
      echo "</table>";

  }
  mysql_close($db_connection);

?>