<!--
  sdot project task {s.dot}
  http://cis444.cs.csusm.edu/nguye208/sdot/html/sproject1task.html

  ** DENISE THUY VY NGUYEN 
  ** =^.,.^= 10-23-2-17
  
  ** Alex Hom
  ** added PHP 11-20-17
-->
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">
    <title>{s.dot} User Selects Project</title>
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
          <span class="navbar-toggler-icon">
            
          </span>
        </button>

<!--TOP NAV-->
        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
          <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="../../../Resources/html/index.html">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../../CreateProject/createProject1.php">Create Project</a>
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
          </ul>
        </nav>
      </div>
    </div>

<!--MAIN CONTENT DIV-->

        <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
          <h1>Selected Project Task Tracker
          <img src="../../../Resources/images/sdot.png" width="autp" height="50" align="text-center"></h1>
         
          <section class="row text-center placeholders">
            <div class="col-6 col-sm-3 placeholder">
              <img src="data:image/gif;base64,R0lGODlhAQABAIABAAJ12AAAACwAAAAAAQABAAACAkQBADs=" width="200" height="200" class="img-fluid rounded-circle" alt="{s.dot}">
              <h4>sdot</h4>
              <div class="text-muted">Project 1</div>
            </div>                   
          </section>
          
          <a class="btn btn-lg btn-primary" href="../TaskTracking/addTaskMain.php" role="button">Add A Task</a>

  <h2>Track Task</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th></th>
                  <th>#Task ID</th>
                  <th>Priority</th>
                  <th>Task</th>
                  <th>Assigned To</th>
                  <th>Completion</th>
                  <th>Scrum</th>
                  <th>Remarks</th>                  
                </tr>
              </thead>
              <tbody>

	<!--PHP START-->		  
<?php
	
	// LOGIN 
	//if cookies don't exist resend to login 
		session_start();
	  

            if(isset($_SESSION["SDOT_user_login"])) {
              $UserID = $_SESSION["SDOT_user_login"];
            }
            else {
            echo "<script type='text/javascript'>
                  window.location = '../../Users/login.html'
                  </script>";
            }
	
	if(isset($_SESSION["SDOT_user_project"])) {
		$ProjectID = $_SESSION["SDOT_user_project"];
	}
	else {
		echo "<script type='text/javascript'>
           window.location = '../ProjectOverview/chooseProject.php'
		</script>";
	}
	
	//SERVER CONNECTION
	$conn = mysqli_connect("localhost", "group_e", "sdotDB", "group_e");
	
	if (!$conn) {
		echo "Error: Unable to connect to MySQL." . PHP_EOL;
		echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
		echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
		exit;
	}
	
	//QUERY SUBMIT
		$queryString = "SELECT TaskID, Priority, Task, Complete, Username, SCRUM, Remarks FROM Tasks, Users WHERE (TProjectID = '" . $ProjectID. "') AND (UserID =  '" . $UserID. "')";
		if($result = mysqli_query($conn, $queryString)){
	
			// QUERY PARS
			// parse the information and display 
			// create table dynamicly till end of query table
			while( $row = mysqli_fetch_array($result)){
				
				$TaskID = $row['TaskID'];
				$Priority = $row['Priority'];
				$Task = $row['Task'];
				$Complete = $row['Complete'];
				$Username = $row['Username'];
				$SCRUM = $row['SCRUM'];
				$Remarks = $row['Remarks'];
				
				echo "<tr><td>
                    <form id='myForm' action='EditTask.php' name='taskEditSubmit' method='post'>
                      <input id='hiddentaskID' type='hidden' name='taskID' value=". $TaskID .">
                      <input id='submitedit' type='submit' value='Edit'>
                    </form> 
                  </td>
                  <td> ". $TaskID ." </td>
                  <td> ". $Priority ." </td>
                  <td> ". $Task ." </td>
                  <td> ". $Username ." </td>
                  <td> ". $Complete ." </td>
                  <td> ". $SCRUM ." </td>
                  <td> ". $Remarks ." </td></tr> ";
			}		
		}
		else {
			// populate an empty table
			echo "ERROR: " . mysqli_error($conn);
		mysqli_free_result($result);
	}
	
	// close the connection
	mysqli_close($conn);
?>

	<!--PHP END-->		
              </tbody>
            </table>
          </div>
        </main>
<!--END MAIN CONTENT-->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../../Resources/js/popper.min.js"></script>
    <script src="../../../Resources/js/bootstrap.min.js"></script>
  </body>
</html>