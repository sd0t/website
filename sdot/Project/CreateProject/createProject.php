<!--
  CREATE NEW PROJECT {s.dot}
  http://cis444.cs.csusm.edu/nguye208/sdot/html/createProject.html
  http://cis444.cs.csusm.edu/group_E/sdot/Project/CreateProject/createProject.html  
  
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

    <title>{s.dot} Create Project</title>
    <link rel="icon" href="../images/sdot.png" />

<!--BOOTSTRAP-->
    <link href="../../Resources/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="../../Resources/css/sdot.css" rel="stylesheet">
    <link href="../../Resources/css/dashboard.css" rel="stylesheet">
  </head>

<!--BODY-->
  <body>
    <header>

<!--TOP NAV--> 
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="../../Resources/html/index.html">
          <img src="../../Resources/images/sdot.png" width="autp" height="25" align="text-center">
          {s.dot}
        </a>
        
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="../../Resources/html/index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="../../Project/CreateProject/createProject.html">Create Project</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../../Project/ProjectHub/ProjectOverview/chooseProject.php">Choose Project</a>
          </li>
         <li class="nav-item">
            <a class="nav-link" href="../../Users/UserPreferences/userPreferences.php">User Preferences</a>
          </li>
        <li class="nav-item">
            <a class="nav-link" href="../../Users/logout.php">Logout</a>
        </li>
        </ul>
        <!--SEARCH FUNCTION
          <form class="form-inline mt-2 mt-md-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
        -->
        </div>
      </nav>
    </header>
<!--TOP NAV--> 

<!--SIDE NAV--> 
    <div class="container-fluid">
      <div class="row">
               <!--
         <nav class="col-sm-3 col-md-2 d-none d-sm-block bg-light sidebar">
          <ul class="nav nav-pills flex-column">
            <li class="nav-item">
              <a class="nav-link" href="../html/projectoverview.html">Overview</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../html/bugtrack.html">Bug Tracking</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../html/tasktrack.html">Task Tracking</a>
            </li>
          -->
          </ul>
        </nav>
<!--END SIDE NAV--> 


<!--PHP-->
<?php
$link = mysqli_connect("localhost", "group_e", "sdotDB", "group_e");

if (!$link) {
    echo "Error: Unable to create project" . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

echo "You have created a project!" . PHP_EOL;


// Escape user inputs for security
$ProjectID = mysqli_real_escape_string($link, $_REQUEST['ProjectID']);
$ProjectName = mysqli_real_escape_string($link, $_REQUEST['ProjectName']);
$ProjectSummary = mysqli_real_escape_string($link, $_REQUEST['ProjectSummary']);
 
// attempt insert query execution
$sql = "INSERT INTO Projects (ProjectName, ProjectSummary) VALUES ('$ProjectName','$ProjectSummary')";
if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
foreach($_REQUEST['Username'] AS $val) {//for cycle, for each element it will be assign as item to val.
    $UserID = mysqli_real_escape_string($link, $val);//for each user there will be an insert into project members
	$sql = "INSERT INTO ProjectMembers (PMProjectID, PMUserID) VALUES (LAST_INSERT_ID(), ". $UserID .")";//taking user id 
	if(mysqli_query($link, $sql)){
		echo "Records added successfully.";
	} else{
		echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
}



mysqli_close($link);
?>		

<!-- MAIN BODY
  User will create a new project
-->
  <div class="container">
   <div class="jumbotron mt-3">
          <h1>Project Created                       
            <img src="../../Resources/images/sdot.png" width="autp" height="50" style="text-align:center"></h1>
       
            <section class="row text-center placeholders">
          </section>


       
<!--END NEW PEOJECT FORM-->


        </main>
      </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
    <script type = "text/javascript"  src = "createProject.js"></script>
    <script type = "text/javascript"  src = "../../User/NewUser/usercheck/pswd_chk.js" ></script>
<script type="text/javascript">
        $(document).ready(function() {
            $('#boot-multiselect-demo').multiselect({
            includeSelectAllOption: true,
            buttonWidth: 250,
            enableFiltering: true
        });
        });
    </script>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>
