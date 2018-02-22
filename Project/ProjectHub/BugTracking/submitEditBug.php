<!--
  ADD A BUG PAGE {s.dot}
  http://cis444.cs.csusm.edu/nguye208/sdot/html/addBug.html
  ** DENISE THUY VY NGUYEN 
  ** =^.,.^= 10-23-2017
-->
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>{s.dot} Add Bug</title>
    <link rel="icon" href="../../../Resources/images/sdot.png" />


<!--BOOTSTRAP-->
    <link href="../../../Resources/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="../../../Resources/css/sdot.css" rel="stylesheet">
    <link href="../../../Resources/css/dashboard.css" rel="stylesheet">
  </head>

  <body>
    <header>

<!--TOP NAV-->
     <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href="../../../Resources/html/index.php">
        <img src="../../../Resources/images/sdot.png" width="autp" height="25" align="text-center">
      {s.dot}
    </a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

<!--TOP NAV-->
        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
          <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="../../../Resources/html/index.html">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../../CreateProject/createProject.html">Create Project</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="../ProjectOverview/chooseProject.php">Choose Project</a>
          </li>
         <li class="nav-item">
            <a class="nav-link" href="../../../Users/UserPreferences/userPreferences.php">User Preferences</a>
          </li>
          <li>
            <a class="nav-link" href="../../../Users/logout.php">Logout</a>
          </li>
        </ul>
        </div>
      </nav>
    </header>

<!--SIDE NAV-->
    <div class="container-fluid">
      <div class="row">
         <nav class="col-sm-3 col-md-2 d-none d-sm-block bg-light sidebar">
          <ul class="nav nav-pills flex-column">
              <li class="nav-item"> 
              <a class="nav-link" href="../ProjectOverview/chooseProject.php">Project Hub</a>       
            </li>
             <li class="nav-item"> 
              <a class="nav-link" href="../ProjectOverview/selectedProject.php">Selected Project Overview</a> </li>
            <li class="nav-item active">
              <a class="nav-link active" href="../BugTracking/bugtrack.php">Bug Tracker</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../TaskTracking/tasktrack.php">Task Tracker</a>
            </li>             
            <li class="nav-item ">
              <a class="nav-link " href="../DevForum/devForum.html">Dev Form</a>
            </li>   
          </ul>
        </nav>
      </div>
    </div>
 

<!-- MAIN BODU 
  User will create a new project
-->
        <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
          <h1>Edit Bug
            <img src="../images/sdot.png" width="autp" height="50" style="text-align:center"></h1>
       
            <section class="row text-center placeholders">

          </section>
		  
<!--PHP-->	  
<?php
session_start();
  

  //if cookies don't exist resend to login 
  if(isset($_SESSION["SDOT_user_project"])) {
    $BProjectID = $_SESSION["SDOT_user_project"];
  }
  else {
    echo "<script type='text/javascript'>
           window.location = '../ProjectOverview/chooseProject.php'
    </script>";
  }

$link = mysqli_connect("localhost", "group_e", "sdotDB", "group_e");

if (!$link) {
    echo "Error: Unable to create Bug" . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

//echo "You have created a Bug!" . PHP_EOL;


// Escape user inputs for security
$BugID = mysqli_real_escape_string($link, $_POST['BugID']);
$SourceFile = mysqli_real_escape_string($link, $_POST['SourceFile']);
$Location = mysqli_real_escape_string($link, $_POST['Location']);
$Description = mysqli_real_escape_string($link, $_POST['Description']);
$Status = mysqli_real_escape_string($link, $_POST['Status']);
$BReporterID = mysqli_real_escape_string($link, $_POST['BReporterID']);
$BAssignedID = mysqli_real_escape_string($link, $_POST['BAssignedID']);

// attempt insert query execution
$sql = " UPDATE Bugs
         SET SourceFile = '". $SourceFile ."' , Location = '". $Location ."' , Description = '". $Description ."' , Status = '". $Status ."', BProjectID = ". $BProjectID ." , BReporterID = ". $BReporterID ." , BAssignedID = ". $BAssignedID ."
         WHERE BugID = ". $BugID .";";

if(mysqli_query($link, $sql)){
    echo "Bug added successfully.";
} else{
    echo "ERROR: Couldn't Add bug $sql. " . mysqli_error($link);
}

mysqli_close($link);
?>		

<script>
  window.setTimeout(function(){
        // Move to a new location or you can do something else
        window.location.href = "bugtrack.php";

    }, 50000000);
</script>
        </main>





<!-- Bootstrap core JavaScript-->
    <script type = "text/javascript"  src = "newBug.js"></script>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>
