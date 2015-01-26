<?php 
    $emailAddress = $_POST['emailAddress'];
    $nickname = $_POST['nickname'];
    
    if (!empty($_REQUEST['emailAddress'])) {


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
    }
    else {
        $emailAddress = "testaccount123@email.com";
        $nickname = "testaccount123";
        $id = 19;
    }
   
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>To-Do List Tracker</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">

    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="./css/styles.css">


    <!-- Custom Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    <script> 
        //window.history.replaceState( {} , '', 'Home.php' );

        if (typeof(Storage) != "undefined") {
            // Store
            var userID = "<?php echo $id; ?>";
            var nickname = "<?php echo $nickname; ?>";
            if (userID.length!=0 && nickname.length!=0) {
                localStorage.setItem("userID", userID.toString());
                localStorage.setItem("nickname", nickname.toString());           
            }
     

        }
    </script>

    <script> 
        $(document).ready(function() {

        var nickname = localStorage.getItem("nickname");
        $("#headerLogin").html('Track your To-Do List, Welcome ' + nickname); 

        });


    </script>
</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" id="headerLogin">Track Your To-Do List</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right" id="navBarLinks">

                    <li><a href="Home.php">Home</a></li>
                    <li><a href="FAQ.php">FAQ</a></li>
                    <li><a href="Credits.php">Credits</a></li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Header -->
    <div class="intro-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-message">
                        <div id="siteTitle">
                            <h1>Track Your To-Do List</h1>
                        </div>
                        <ul class="list-inline headerButtons">
                            <li>
                                <a href="TodoList.php" class="btn btn-default btn-lg"><span class="section-name">To-Do List</span></a>
                            </li>
                            <li>
                                <a href="ArchivedTasks.php" class="btn btn-default btn-lg"> <span class="section-name">Archived Tasks</span></a>
                            </li>

                            <li>
                                <a href="queryAllTasks.php" class="btn btn-default btn-lg"> <span class="section-name">All Incompleted Tasks</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Page Content -->
    <div class="section-gray">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <header>
                        <h2>What does this website do?</h2>
                    </header>
                    
                    <p>This website allows you to track a to do list, which will have 3 components: </p>
                    <ol type="1">
                        <li>A list of pending tasks</li>
                        <li>A list of tasks that need to be done now</li>
                        <li>Finished tasks</li>
                    </ol>
                    <p>The list can be composed of anything that needs to be done, like class assignments, chores, and bills that need to be paid.</p>

                    <p>The <strong>To-Do List</strong> page allows you to track your pending tasks and active tasks. The form on the page enables you to submit information about a particular task that you would like to keep track of. In addition to this, there are three columns of pending, active, and completed tasks that you can use to drag and drop tasks between the three. The completed task column only displays the five most recently completed tasks.</p>

                    <p>The <strong>Archived Tasks</strong> page allows you to view old tasks that you have completed.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">

                <div class="col-md-10 col-md-offset-1">
                    <section id="sendMessage">
                     
                        <h2 id="footerh2">Inquiries? Send a Message.</h2>
                        
                        <p>Nulla enim eros, porttitor eu, tempus id, varius non, nibh. Duis enim nulla, luctus eu, dapibus lacinia, venenatis id, quam. Vestibulum imperdiet, magna nec eleifend rutrum, nunc lectus vestibulum velit, euismod lacinia quam nisl id lorem. Quisque erat. Vestibulum pellentesque, justo mollis pretium suscipit, justo nulla blandit libero, in blandit augue justo quis nisl.</p>
                    </section>
                </div>
            </div>
            <p class="copyright text-muted small">Copyright &copy; Elaine Wu 2014. All Rights Reserved</p>
        </div>
    </footer>
</body>

</html>