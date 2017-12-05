	<!--
	  LOGIN {s.dot}
	  http://cis444.cs.csusm.edu/nguye208/sdot/Users/login.html
	  http://public.csusm.edu/mettavy/sdot/Users/login.html
	  
	  ** DENISE THUY VY NGUYEN 
	  ** =^.,.^= 10-23-2-17
	-->
	<!doctype html>
	<html lang="en">
	  <head>
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	    <meta name="description" content="">
	    <meta name="author" content="">
	    <link rel="icon" href="../../../../favicon.ico">

	    <title>{s.dot} Sign Up</title>
	    <link rel="icon" href="../images/sdot.png" />

	<!--JS-->
	    <script type = "text/javascript"  src = "NewUser/usercheck/signup.js">
	    </script>


	<!--BOOTSTRAP-->
	    <link href="../Resources/css/bootstrap.min.css" rel="stylesheet">
	    <!-- Custom styles for this template -->
	    <link href="../Resources/css/sdot.css" rel="stylesheet">
	    <link href="../Resources/css/dashboard.css" rel="stylesheet">
	  </head>

	<!--BODY-->
	  <body>
	    <header>

	<!--TOP NAV--> 
	      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
	         <a class="navbar-brand" href="../Resources/html/about.html">
	        <img src="../Resources/images/sdot.png" width="autp" height="25" align="text-center">
	      {s.dot}
	    </a>
	        
	        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
	          <span class="navbar-toggler-icon"></span>
	        </button>
	        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
	         <ul class="navbar-nav">
	         	<li>
	           <a class="nav-link" href="../Resources/html/about.html">About</a>
	          </li>
	            <li class="nav-item">
	            <a class="nav-link" href="NewUser/signup.html">Sign Up</a>
	          </li>
	          <li class="nav-item active">
	            <a class="nav-link active" href="../Users/login.html">Log In<span class="sr-only">(current)</span></a>
	        </div>
	      </nav>
	    </header>
	<!--TOP NAV--> 

	<!--SIDE NAV--> 
	    <div class="container-fluid">
	      <div class="row">
	          </ul>
	        </nav>
	<!--END SIDE NAV-->


	<!--START BODY FORM-->
	<div class="body_container">
	    <div class="main_body">
	  <p id="main_content">
	  	<div class="jumbotron mt-4 .col-6 .col-md-4">

	    <img src="../Resources/images/sdot.png" width="autp" height="400" align="text-center"></br>
	          {s.dot}
	        </p>

	<!--PHP-->
	 <?php
 $link = mysqli_connect("localhost", "group_e", "sdotDB", "group_e");

if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
// Escape user inputs for security
$Username = mysqli_real_escape_string($link, $_REQUEST['Username']);
$Password = mysqli_real_escape_string($link, $_REQUEST['Password']);
 
// attempt insert query execution
$sql = "SELECT UserID, FName, LName FROM Users WHERE Username = '" . $Username . "' and Password = '" . $Password ."'";
if ($result=mysqli_query($link,$sql))
  {
  $rowcount=mysqli_num_rows($result);
  if ($rowcount == 1)
  {
	  $row=mysqli_fetch_row($result);
	  
		$cookie_name = "SDOT_user_login";
		$cookie_name_info = $row[0];
		
		$cookie_FName = "SDOT_user_FName";
		$cookie_FName_info = $row[1];
		
		$cookie_LName = "SDOT_user_LName";
		$cookie_LName_info = $row[2];
	
		// cookie set for one day 
		setcookie($cookie_name, $cookie_name_info, time() + (86400), "/");
	  
	    
	echo "<script type='text/javascript'>
           window.location = '../Resources/html/index.php'
      </script>";  
  }
  else echo "Error, cannot find the account. Please try again!";
  mysqli_free_result($result);
}

mysqli_close($link);
 

  	
   ?>
	  </body>
	</html>


	<!-- Bootstrap core JavaScript
	    <script type = "text/javascript"  src = "../js/signupr.js"></script>
	    <script type = "text/javascript"  src = "../js/newTask.js"></script>
	-->
	    <!-- Bootstrap core JavaScript
	    ================================================== -->
	    <!-- Placed at the end of the document so the pages load faster -->
	    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

	    <script src="../Resources/js/popper.min.js"></script>
	    <script src="../Resources/js/bootstrap.min.js"></script>

