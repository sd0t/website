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
      <a class="navbar-brand" href="../../../Resources/html/index.html">
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
            <a class="nav-link" href="../../../Project/CreateProject/createProject.html">Create Project</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="chooseProject.html">Choose Project<span class="sr-only"> (current) </span></a>
          </li>
         <li class="nav-item">
            <a class="nav-link" href="../../../Users/UserPreferences/userPreferences.html">User Preferences</a>
          </li>
        <li class="nav-item">
            <a class="nav-link" href="../../../Users/logout.html">Logout</a>
        </li>
        </ul>

<!--SERACH FUNCTION
          <form class="form-inline mt-2 mt-md-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
      -->
        </div>
      </nav>
    </header>

<!--SIDE NAV-->
    <div class="container-fluid">
      <div class="row">
         <nav class="col-sm-3 col-md-2 d-none d-sm-block bg-light sidebar">
          <ul class="nav nav-pills flex-column">
            <li class="nav-item">
              <a class="nav-link" href="../ProjectOverviewchooseProject.html">Project Hub</a>
            </li>
            <li>
              <a class="nav-link" href="../ProjectOverviewselectproject1.html">Selected Project Overview</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link active" href="sproject1bug.html">Bug Tracker</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../TaskTracking/sproject1task.html">Task Tracker</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link " href="../DevForum/devforum.html">Dev Forum</a>
            </li>   
          </ul>
        </nav>

    <div class="container-fluid">
      <div class="row">
         <nav class="col-sm-3 col-md-2 d-none d-sm-block bg-light sidebar">
          <ul class="nav nav-pills flex-column">
              <li class="nav-item"> 
              <a class="nav-link" href="../ProjectOverview/chooseProject.html">Project Hub</a>       
            </li>
             <li class="nav-item"> 
              <a class="nav-link" href="../ProjectOverview/selectedProject.html">Selected Project Overview</a> </li>
            <li class="nav-item active">
              <a class="nav-link active" href=".sproject1bug.html">Bug Tracker</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../TaskTracking/sproject1task.html">Task Tracker</a>
            </li>             
            <li class="nav-item ">
              <a class="nav-link " href="../DevForum/devForum.html">Dev Forum</a>
            </li>   
          </ul>
          
        </nav>

 

<!-- MAIN BODU 
  User will create a new project
-->
        <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
          <h1>Create New Bug Task
            <img src="../images/sdot.png" width="autp" height="50" style="text-align:center"></h1>
       
            <section class="row text-center placeholders">

          </section>
		  
<!--PHP-->	  
<?php
$link = mysqli_connect("localhost", "zaval035", "q29A05", "zaval035");

if (!$link) {
    echo "Error: Unable to create Bug" . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

echo "You have created a Bug!" . PHP_EOL;


// Escape user inputs for security
$BugID = mysqli_real_escape_string($link, $_REQUEST['BugID']);
$SourceFile = mysqli_real_escape_string($link, $_REQUEST['SourceFile']);
$Location = mysqli_real_escape_string($link, $_REQUEST['Location']);
$Description = mysqli_real_escape_string($link, $_REQUEST['Description']);
$BProjectID = mysqli_real_escape_string($link, $_REQUEST['BProjectID']);
$BReporterID = mysqli_real_escape_string($link, $_REQUEST['BReporterID']);
$BAssignedID = mysqli_real_escape_string($link, $_REQUEST['BAssignedID']);

// attempt insert query execution
$sql = "INSERT INTO Bugs (SourceFile, Location, Description, BReporterID, BAssignedID) 
WHERE 
VALUES ('$SourceFile','$Location','$Description','$BReporterID','$BAssignedID')";
if(mysqli_query($link, $sql)){
    echo "Bug added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

mysqli_close($link);
?>		

<!--NEW BUG FORM-->
          <form id = "myForm">
           <h2>Bug Added</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Reporter:</th>
                  <td>
                    <?php echo $_POST["BReporterID"]; ?>
                  </td>
                </tr>
              </thead>

              <tbody>
                <tr>
                  <th>Assigned to:</th>
                  <td>
                   <?php echo $_POST["BAssignedID"]; ?>
                  </td>
                </tr>


                  <tr>
                  <th>Source File:</th>
                   <td>
                   <?php echo $_POST["SourceFile"]; ?>
                  </td>
                </tr>

                <tr>
                  <th>Location:</th>
                   <td>
                   <?php echo $_POST["Location"]; ?>
                  </td>
                </tr>


                <tr>
                  <th>Description:</th>
                   <td>
                  <?php echo $_POST["Description"]; ?>
                  </td>
                </tr>

          
              </tbody>
            </table>
          </div>
      </form>
<!--END NEW BUG FORM-->

        </main>
      </div>
    </div>

          
          </div>
        </main>
      </div>
    </div>





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
