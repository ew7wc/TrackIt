<?php 
    $emailAddress = $_GET['emailAddress'];
    $nickname = $_GET['nickname'];
    
    $db_connection = new mysqli('stardock.cs.virginia.edu', 'cs4720ew7wc', 'june291993', 'cs4720ew7wc');
    if (mysqli_connect_errno()) {
        echo "Connection Error!";
        return;
    }

    $stmt = $db_connection->stmt_init();
    $id;
    if($stmt->prepare("SELECT * from `users` WHERE emailAddress='$emailAddress'")) {
        $stmt->bind_param("s", $emailAddress);
        $stmt->execute();
        $stmt->bind_result($userID, $emailAddress, $nickname);
        if($stmt->fetch() == NULL) {
            $stmt2 = $db_connection->stmt_init();
            if($stmt2->prepare("INSERT INTO `users` (emailAddress, nickname) VALUES ('$emailAddress','$nickname')")) {
                $stmt2->bind_param("ss", $emailAddress, $nickname);
                $stmt2->execute();
                $id = $db_connection->insert_id;
            }
        
        }
        else {
            $id = $userID;
        }

        
    } 
    echo "userID: $id";

?>