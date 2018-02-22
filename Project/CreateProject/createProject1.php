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
            <a class="nav-link active" href="../../Project/CreateProject/createProject1.php">Create Project</a>
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


<!-- MAIN BODY
  User will create a new project
-->
  <div class="container">
   <div class="jumbotron mt-3">
          <h1>Create New Project                       
            <img src="../../Resources/images/sdot.png" width="autp" height="50" style="text-align:center"></h1>
       
            <section class="row text-center placeholders">
          </section>

<!--NEW PEOJECT FORM-->
          <form action ="createProject.php" id="myForm" method="POST">
          <h2>Enter in project information</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Project Name:</th>
                  <td>
                    <input type = "text" id="projectName" size = "45" name = "ProjectName" placeholder="Enter in a project name" onchange=""/>
                  </td>
                </tr>
              </thead>

              <tbody>
                <tr>
                  <th>Collaborators:</th>
                  <td>
                      <select name = "Username[]" id="Username" multiple="multiple" >
                  <?php
 $link = mysqli_connect("localhost", "group_e", "sdotDB", "group_e");

if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
// Escape user inputs for security
$teamid = mysqli_real_escape_string($link, $_REQUEST['teamid']);
 
// attempt insert query execution
$sql = "SELECT UserID, Username FROM Users";
if ($result=mysqli_query($link,$sql))
  {

  // Fetch one and one row
  while ($row=mysqli_fetch_row($result))
    {
    echo "
	   <option value = " .$row[0]. ">" . $row[1] . ", " . $row[2]. "</option>";
    }
  // Free result set
  mysqli_free_result($result);
}

mysqli_close($link); 	
   ?></select>
                  </td>

                </tr>


                  <tr>
                  <th>Project Summary:</th>
                   <td>
                    <input type = "text" id="summary" size = "45" name = "ProjectSummary" placeholder="Enter in a project description" onchange=""/>
                  </td>
                </tr>

              </tbody>
            </table>
          </div>

        <input type = "submit" class="btn btn-lg btn-primary" name = "submit" value="CREATE">
        <input type= "reset" class="btn btn-lg btn-primary" name="reset" value="CLEAR">

      </form>
<!--END NEW PEOJECT FORM-->


        </main>
      </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
    <script type = "text/javascript"  src = "createProject.js"></script>
    <script type = "text/javascript"  src = "../../User/NewUser/usercheck/pswd_chk.js" ></script>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../Resources/js/popper.min.js"></script>
    <script src="../../Resources/js/bootstrap.min.js"></script>
  </body>
</html>
