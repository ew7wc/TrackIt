<?php

  $dueDate = $_GET['inputCompletionDate'];
  $dueTime = $_GET['inputTimeDue'];

  $currDate = $_GET['inputCurrDate'];
  $currTime = $_GET['inputCurrTime'];

  $taskName = $_GET['inputTaskName'];

  $parseDueTime = explode(":", $dueTime);

  $dueDate = new DateTime($dueDate);
  $dueDate = $dueDate->setTime($parseDueTime[0], $parseDueTime[1]);

  $parseCurrTime = explode(":", $currTime);

  $today = new DateTime($currDate);
  $today = $today->setTime($parseCurrTime[0], $parseCurrTime[1]);
  
  $interval = date_diff($dueDate, $today);

  $monthsLeft = $interval->format('%m');
  $daysLeft = $interval->format('%d');
  $hoursLeft = $interval->format('%h');
  $minutesLeft = $interval->format('%i');


  echo "<p>You have $monthsLeft months, $daysLeft days, $hoursLeft hours, and $minutesLeft minutes until $taskName is due.<p>"; 
?>