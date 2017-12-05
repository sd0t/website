<!--
  ADD TASK {s.dot}
  http://cis444.cs.csusm.edu/nguye208/sdot/html/addTask.html

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

    <title>{s.dot} Create Project</title>
    <link rel="icon" href="../images/sdot.png" />


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
      <a class="navbar-brand" href="../../../Resources/html/index.html">
        <img src="../../../Resources/images/sdot.png" width="autp" height="25" align="text-center">
      {s.dot}
    </a>

        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon">
            
          </span>
        </button>
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
            <li class="nav-item ">
              <a class="nav-link " href="../BugTracking/bugtrack.php">Bug Tracker</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link active" href="../TaskTracking/tasktrack.php">Task Tracker</a>
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
          <h1>Edit Task
            <img src="../images/sdot.png" width="autp" height="50" style="text-align:center"></h1>
       
            <section class="row text-center placeholders">

          </section>
		  
<!--PHP-->	  
<?php

  if(isset($_COOKIE["SDOT_user_project"])) {
    $TProjectID = $_COOKIE["SDOT_user_project"];
  }
  else {
    echo "<script type='text/javascript'>
           window.location = '../../../Users/logout.html'
    </script>";
  }

$link = mysqli_connect("localhost", "group_e", "sdotDB", "group_e");

if (!$link) {
    echo "Error: Unable to create Bug" . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

//echo "You have created a Task!" . PHP_EOL;


// Escape user inputs for security
$TaskID =  $_POST['taskID'];
$Priority = $_POST['Priority'];
$Task = $_POST['Task'];
$Complete = $_POST['Complete'];
$SCRUM = $_POST['SCRUM'];
$Remarks = $_POST['Remarks'];
$TAssignedID = $_POST['userSelect'];

// attempt insert query execution
$sql = "UPDATE Tasks 
        SET Priority = '". $Priority ."', Task = '". $Task ."' , Complete = '". $Complete ."' , SCRUM = ". $SCRUM ." , Remarks = '". $Remarks ."' , TProjectID = ". $TProjectID ." , TAssignedID = ". $TAssignedID ." 
        WHERE TaskID = ". $TaskID .";";
if(mysqli_query($link, $sql)){
    echo "Task updated successfully.";
} else{
    echo "ERROR: Couldn't task $sql. " . mysqli_error($link);
}

mysqli_close($link);
?>		
<script>
  window.setTimeout(function(){
        // Move to a new location or you can do something else
        window.location.href = "tasktrack.php";

    }, 5000);
</script>
        </main>

<!-- Bootstrap core JavaScript-->
<script type = "text/javascript"  src = "newTask.js"></script>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>
