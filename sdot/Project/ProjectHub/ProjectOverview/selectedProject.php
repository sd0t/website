<!--
  sdot selected {s.dot}
  http://cis444.cs.csusm.edu/nguye208/sdot/html/selectedproject1.html
  http://public.csusm.edu/mettavy/sdot/Project/ProjectHub/ProjectOverview/selectproject1.html

  ** DENISE THUY VY NGUYEN 
  ** =^.,.^= 10-23-2-17
-->
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
  
  <?php
  //this is to store the project id.
  $storeproject = $_GET['idProject'];
  ?>
  
           
  
    <header>
<!--TOP NAV-->
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href="../html/index.html">
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
            <a class="nav-link" href="viewprojects.html">Choose Project<span class="sr-only">(current)</span></a>
          </li>
         <li class="nav-item">
            <a class="nav-link" href="../../../Users/UserPreferences/userPreferences.html">User Preferences</a>
          </li>
          <li>
            <a class="nav-link" href="../../../Users/logout.html">Logout</a>
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
              <a class="nav-link" href="../ProjectOverview/chooseProject.html">Project Hub</a>
            </li>
             <li class="nav-item">
              <a class="nav-link active" href="selectproject1.html">Selected Project Overview</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../BugTracking/sproject1bug.html">Bug Tracker</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../TaskTracking/sproject1task.html">Task Tracker</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../DevForum/devForum.html">Dev Forum</a>
            </li>        
          </ul>
        </nav>
 </div>
    </div>
		
 <?php
			 $link = mysqli_connect("localhost", "zaval035", "q29A05", "zaval035");

			if (!$link) {
				echo "Error: Unable to connect to MySQL." . PHP_EOL;
				echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
				echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
				exit;
			}
			 
			// query
			$sql = "SELECT ProjectID, ProjectName, PM.PMProjectID, PM.PMUserID, PU.FName, PU.LName FROM Projects
			inner join ProjectMembers PM ON PM.PMProjectID = Projects.ProjectID
			inner join Users PU ON PU.UserID = PM.PMUserID
			WHERE Projects.ProjectID = '" . $storeproject . "'";
			
			
			if ($result=mysqli_query($link,$sql))
			  {
				
					$counter = 0;
					$projectName = "";
				// Fetch one and one row
			  while ($row=mysqli_fetch_row($result))
				{
				if ($counter == 0){
					$projectName = $row[1];
					echo "<main role='main' class='col-sm-9 ml-sm-auto col-md-10 pt-3'>
					<h1>Selected Project: ". $row[1] ."
					<img src='../../../Resources/images/sdot.png' width='autp' height='50' align='text-center'></h1>
				 

					<h2>{s.dot}</h2>
					<div class='table-responsive'>
					<table class='table table-striped'>
					  <thead>
						<tr>
						  <th>Project Name</th>
						  <td>". $row[1] ."</td>
						</tr>
					  </thead>

					  <tbody>
						<tr>
						  <th>Collaborators</th>";
				}		  
				echo "<td>  ". $row[4] .",  ". $row[5] ."    </td>";				
				++$counter;
				}
				echo "</tr>
					  </tbody>
						</table>
					</div>


				  <section class='row text-center placeholders'>
					<div class='col-6 col-sm-3 placeholder'>
					  <img src='data:image/gif;base64,R0lGODlhAQABAIABAAJ12AAAACwAAAAAAQABAAACAkQBADs=' width='200' height='200' class='img-fluid rounded-circle' alt='Generic placeholder thumbnail'>
					  <h4>sdot</h4>
					  <div class='text-muted'>". $projectName ."</div>
					</div>
				  </section>
				  </main>";
			  // Free result set
			  mysqli_free_result($result);
			}

			mysqli_close($link); 	
			   ?>

     

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>
