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

	<!--JQUERY stuff -->
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
	<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
	<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	<script src="http://code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
	
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	
	<!-- Custom CSS -->
	<link rel="stylesheet" type="text/css" href="./css/styles.css">
	<link rel="stylesheet" type="text/css" href="./css/dragAndDrop.css">
	<link rel="stylesheet" type="text/css" href="./css/progressbar.css">
	<!-- Custom Fonts -->
	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

	<script>
		var nickname = localStorage.getItem("nickname");
		if (nickname===null) {
            nickname = "testaccount123";
            localStorage.setItem("userID", "19");
            localStorage.setItem("nickname", nickname.toString());  
        }
		$(document).ready(function() {
		
       		$("#headerLogin").html('Track your To-Do List, Welcome ' + nickname); 
			$("#submitTaskBtn").click(function() {

				$.ajax({
					url: "/~ew7wc/final/php/submitTask.php",
					data: {inputTaskName: $("#inputTaskName").val(), 
					inputCompletionDate: $("#inputCompletionDate").val(), 
					inputTimeDue: $("#inputTimeDue").val(), 
					priorities: $("input[name='priorities']:checked").val(),
					typeTaskSelected: $("#typeTaskSelected").val(),
					inputStatus: $("#inputStatus").val(),
					inputNotes: $("#inputNotes").val(),
					userID: localStorage.getItem('userID')
					},
					success: function(data){
						alert("Task submitted."); 	
						location.reload();

					}
				});
			}); 

			$(document.body).on('click', '#sortBtn', function () {
				//alert ('button ' + this.parentNode.id + ' clicked');
			    $(this).parent().remove();
			    $.ajax({
					url: "/~ew7wc/final/php/deleteTask.php",
					data: {taskID: this.parentNode.id},
					success: function(data){
					}
				});
			});

			$.ajax({
				url: "/~ew7wc/final/php/getAmountCompleted.php",
				data: {userID: localStorage.getItem('userID')},
				success: function(data){
					$( "#progressbar").progressbar({
						value: parseFloat(data)

					});
					$("span#progressText").text(parseFloat(data).toFixed(2) + ' %');

				}
			});
		
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
								<button class="btn btn-default btn-lg" disabled="disabled"><span class="section-name">To-Do List</span></button>
							</li>
							<li>
								<a href="ArchivedTasks" class="btn btn-default btn-lg"><span class="section-name">Archived Tasks</span></a>
							</li>
							<li>
                                <a href="queryAllTasks" class="btn btn-default btn-lg"> <span class="section-name">All Incomplete Tasks</span></a>
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
				<div class="col-md-3">
					<header>
						<h2>Enter A Task: </h2>
					</header>
					<p> * = Required Fields; enter times in 24 hr format e.g. 23:59, enter dates in YYYY-MM-DD format e.g. 2014-09-22 if not using Chrome.</p>

					<!--TASK FORM START -->

					<!--TASK NAME -->
					<div class="form-group">
						<label for="inputTaskName">Task Name*</label>
						<input type="text" class="form-control" id="inputTaskName" placeholder="Enter the Task Name">
					</div>

					<!--Completion Date -->
					<div class="form-group">
						<label for="inputCompletionDate">Date to be Completed By*</label>
						<input type="date" class="form-control" id="inputCompletionDate">
					</div>

					<!--Time Due-->
					<div class="form-group">
						<label for="inputTimeDue">Time on that Date*</label>
						<input type="time" class="form-control" id="inputTimeDue">
					</div>

					<!--Priority Level -->
					<div class="form-group">
						<label>Priority Level </label>
						<br>
						<label class="radio-inline">
							<input type="radio" name="priorities" id="high" value=1>High
						</label>

						<label class="radio-inline">
							<input type="radio" name="priorities" id="medium" value=2>Medium
						</label>

						<label class="radio-inline">
							<input type="radio" name="priorities" id="low" value=3>Low
						</label>

						
					</div>

					<!--Type of Task-->
					<div class="form-group">
						<label>Type of Task? </label>
						<select class="form-control" id="typeTaskSelected">
							<option> </option>
							<option>Homework</option>
							<option>Misc Academic</option>
							<option>Chores</option>
							<option>Bills</option>
							<option>Other</option>
						</select>
					</div>

					<!--Status-->
					<div class="form-group">
						<label>Active or Pending?*</label>
						<select class="form-control" id="inputStatus">
							<option> </option>
							<option>Active</option>
							<option>Pending</option>
						</select>
					</div>


					<!--Notes-->
					<div class="form-group">
						<label>Notes</label>
						<textarea class="form-control" rows="3" placeholder="Notes" id="inputNotes"></textarea>
					</div>

					<!--Submit Button-->
					<button type="submit" class="btn btn-default" id="submitTaskBtn">Submit</button>


					<div id="results"></div>

					<!--TASK FORM END -->

				</div>
				<!--Column with the task form end -->
				<div id ="sortableColumns">
					<div class="col-md-3">
						<header>
							<h2>Pending:</h2>
						</header>

						<div class="pendingColumn">
							<ul id = "pending" class="connectedSortable">

								
							</ul>
						</div>


					</div>

					<div class="col-md-3">
						<header>
							<h2>Active:</h2>
						</header>

						<div class="activeColumn">

							<ul id = "active" class="connectedSortable">
								
							</ul>

						</div>

					</div>

					<div class="col-md-3">
						<header>
							<h2>Completed:</h2>
						</header>
						<div class="completedColumn">
							<ul id = "completed" class="connectedSortable">
								
							</ul>
							<br>

							<p id="amtComplete">Amount of tasks completed: <span id="progressText">0 %</span></p>
							<div id="progressbar" class="default"><div></div></div>	
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!--JQUERY Drag and Drop-->

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

	<script src="js/TodoList.js"></script>

</body>

</html>