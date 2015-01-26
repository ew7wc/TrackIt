<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Sign in to track your to-do list</title>


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
  <link rel="stylesheet" type="text/css" href="./css/signIn.css">
  <!-- Custom Fonts -->
  <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
      <script>
       $(document).ready(function() {
        $("#GoogleBtn").click(function() {
          window.location.replace("http://ew7wccs4720.appspot.com");
        });
        $("#demoSite").click(function() {
          //window.location.replace("");
        });
      });
     </script>



   </head>

   <body>

    <div class="site-wrapper">

      <div class="site-wrapper-inner">

        <div class="cover-container">

          <div class="layer">

            <div class="inner cover">
              <div class="row">
                <div class="col-md-2">

                </div>
                <div class="col-md-10">
                  <h1><strong>Track your to do list.</strong></h1>
                </div>
              </div>
            </div>


            <div class="inner cover">

      

              <!--GOOGLE SIGN IN -->
              <div class="row">
                <div class="col-md-2">

                </div>
                <div class="col-md-10">
                  <h2 class="cover-heading">Sign in with your Google Account.</h2>
                </div>
              </div>


              <div class="row">
                <div class="col-md-2">

                </div>
                <div class="col-md-10">

                  <button class="btn btn-google-plus" id ="GoogleBtn"><i class="fa fa-google-plus"></i> | Connect with Google </button>
                  <p> *This will redirect to google app engine and back really quickly to the Homepage if you are already logged in a Google Account</p>
                </div>
              </div>
              <!--GOOGLE SIGN IN END-->

              <!--Create account -->
              <div class="row">
                <div class="col-md-2">

                </div>
                <div class="col-md-10">
                  <h2 class="cover-heading">Demo the website.</h2>
                </div>
              </div>


              <div class="row">
                <div class="col-md-2 col-md-offset-2">
                  <form action="http://plato.cs.virginia.edu/~ew7wc/final/Home.php" method="POST">
                    <input type="hidden" name="emailAddress" value="testaccount123@email.com">
                    <input type="hidden" name="nickname" value="testaccount123">
                    <button class="btn btn-sm btn-info" id="demoSite">Demo the website</button> 
                  </form>
                  
                </div>
              </div>
              <!--Create Account-->



            </div>

          </div>

        </div>

      </div>
    </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

  </body>
  </html>

  <?php
  /* Redirect browser */
  //header("Location: http://ew7wccs4720.appspot.com");

  /* Make sure that code below does not get executed when we redirect. */
  exit;
  ?>