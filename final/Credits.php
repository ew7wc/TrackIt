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

        $(document).ready(function() {
            var nickname = localStorage.getItem("nickname");
            if (nickname===null) {
                nickname = "testaccount123";
                
            }
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
                                <a href="ArchivedTasks.php" class="btn btn-default btn-lg"><span class="section-name">Archived Tasks</span></a>
                            </li>
                            <li>
                                <a href="queryAllTasks.php" class="btn btn-default btn-lg"> <span class="section-name">All Incomplete Tasks</span></a>
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
                        <h2>Credits</h2>
                    </header>
                    
                    <p><strong>CSS Designs:</strong></p> 
                        <ul>
                            <li>Header Layout: <a href="http://startbootstrap.com/templates/landing-page/">http://startboostrap.com/templates/landing-page</a>
                            </li>
                            <li>jQuery Sortable Items(adapted and edited both sources): 
                                <ol type ="1">
                                    <li><a href="http://web1.cs-computing.com/apps/demo/bootstrap/bootstrap_demo.nsf/dnd.xsp">http://web1.cs-computing.com/apps/demo/bootstrap/bootstrap_demo.nsf/dnd.xsp</a> </li>
                                    <li><a href=" http://jqueryui.com/sortable/#connect-lists"> http://jqueryui.com/sortable/#connect-lists</a></li>
                                </ol>
                            </li>
                            <li>jQuery Progress Bar Widget: <a href="https://github.com/kopipejst/progressbar/blob/master/skins/default/progressbar.css">  https://github.com/kopipejst/progressbar/blob/master/skins/default/progressbar.css</a> 
                            </li>
                        </ul>
               
                    <p><strong>Header Image:</strong> By Viktor Hanacek <a href="http://picjumbo.com/iphone-4s-with-brown-diary/">http://picjumbo.com/iphone-4s-with-brown-diary/</a></p>
                    <p><strong>Sign in page Image:</strong> By Tanvi Malik <a href="http://magdeleine.co/photo-tanvi-malik-n-76/">http://magdeleine.co/photo-tanvi-malik-n-76/</a></p>

                    <p><strong>Font:</strong> Lato from Google Fonts </p>
                    <p><strong>Other:</strong> Navigation bar and the rest of the layout was created with Bootstrap.</p>
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