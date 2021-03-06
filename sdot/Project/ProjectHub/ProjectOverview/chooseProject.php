<!--
 PROJECTOVERVIEW {s.dot}
  http://cis444.cs.csusm.edu/nguye208/sdot/html/projectoverview.html
  
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
    <title>{s.dot} Choose Project</title>
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
            <a class="nav-link" href="../../../Project/CreateProject/createProject1.php">Create Project</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="chooseProject.php">Choose Project</a>
          </li>
         <li class="nav-item">
            <a class="nav-link" href="../../../Users/UserPreferences/userPreferences.php">User Preferences</a>
          </li>
        <li class="nav-item">
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
              <a class="nav-link active" href="chooseProject.php">Project Hub</a>
            </li>
          </ul>
        </nav>

<!--MAIN CONTENT-->

    <div class="container-fluid">
      <div class="row">
         <nav class="col-sm-3 col-md-2 d-none d-sm-block bg-light sidebar">
          <ul class="nav nav-pills flex-column">
            <li class="nav-item active">
              <a class="nav-link active" href="chooseProject.php">Project Hub</a>
            </li>
        </nav>

	<!--PHP-->	  
 

<!--MAIN CONTENT DIV-->
        <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
          <h1>Choose Project
          <img src="../images/sdot.png" width="autp" height="50" align="text-center"></h1>
         
<b>Page:</b> Create Project
Interactions: Display a form that allows for a project title, summary area and an area to add authorized users (by username).  Submit will generate a unique project number and create a new SQL row in the Project table then takes you back to the Choose Project page.</br>
<b>Nav bar:</b> User Preferences, Choose Project, Create Project</br>
<b>Nav Bar Interactions:</b> Choosing a link will take you to that item’s separate page, if the link for the current page is chosen, it will reload that page to the default state.

          <section class="row text-center placeholders">
		  <?php
			session_start();
			

        //if(isset($_COOKIE["SDOT_user_login"]) ) {
        //  $UserID = $_COOKIE["SDOT_user_login"];
        //}
		if(isset($_SESSION["SDOT_user_login"]) ) {
          $UserID = $_SESSION["SDOT_user_login"];
        }
        else {
        echo "<script type='text/javascript'>
           window.location = '../../../users/login.html'
        </script>";
        }

			 $link = mysqli_connect("localhost", "group_e", "sdotDB", "group_e");

			if (!$link) {
				echo "Error: Unable to connect to MySQL." . PHP_EOL;
				echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
				echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
				exit;
			}

			//recognize user with cookie
			//$UserID = isset($_COOKIE["SDOT_user_login"]); 
			$UserID = isset($_SESSION["SDOT_user_login"]); 
			// attempt insert query execution
			$sql = "SELECT ProjectID, ProjectName FROM Projects
			inner join ProjectMembers PM ON PM.PMProjectID = Projects.ProjectID
			WHERE PM.PMUserID = '" . $UserID . "'";
			
			if ($result=mysqli_query($link,$sql))
			  {

			  // Fetch one and one row
			  while ($row=mysqli_fetch_row($result))
				{
				echo 
						"<div class='col-6 col-sm-3 placeholder'>
						  <img src='data:image/gif;base64,R0lGODlhAQABAIABAADcgwAAACwAAAAAAQABAAACAkQBADs=' width='200' height='200' class='img-fluid rounded-circle' alt='Generic placeholder thumbnail'>

              <form id='myForm' action='selectedProjectCookieCreate.php' name='projectChoosePage' method='post'>
                      <input id='hiddentaskID' type='hidden' name='idProject' value='". $row[0] ."'>
                      <input id='submit' type='submit' value='". $row[1] ."'>
              </form>
						  <!-- <span class='text-muted'><a class='nav-link active' href='selectedProjectCookieCreate.php?idProject=". $row[0] ."'>". $row[1] ."</a></span> --> 
						  
						</div>";
				}
			  // Free result set
			  mysqli_free_result($result);
			}

			mysqli_close($link); 	
			   ?>                
          
          </section>
          
 

          </div>
        </main>
<!--END MAIN CONTENT-->

      </div>
    </div>

          
          </div>
        </main>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../../Resources/js/popper.min.js"></script>
    <script src="../../../Resources/js/bootstrap.min.js"></script>
  </body>
</html>
