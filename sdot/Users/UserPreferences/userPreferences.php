
<!--
  USER PREFERENCE {s.dot}
  http://public.csusm.edu/mettavy/sdot/Users/UserPreferences/usersPref.html
  
  ** DENISE THUY VY NGUYEN 
  http://cis444.cs.csusm.edu/nguye208/sdot/html/viewprojects.html
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
      <link rel="icon" href="../images/sdot.png" />

<!--BOOTSTRAP-->
    <link href="../../Resources/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="../../Resources/css/sdot.css" rel="stylesheet">
    <link href="../../Resources/css/dashboard.css" rel="stylesheet">
  </head>

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

<!--TOP NAV-->
        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
          <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="../../Resources/html/index.html">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../../Project/CreateProject/createProject.html">Create Project</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../../Project/ProjectHub/ProjectOverview/chooseProject.html">Choose Project</a>
          </li>
         <li class="nav-item">
            <a class="nav-link active" href="usersPreferences.html">User Preferences<span class="sr-only">(current)</span></a>
          </li>
          <li>
            <a class="nav-link" href="../logout.html">Logout</a>
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
              <a class="nav-link active" href="../html/projectoverview.html"></a>
            </li>
<!--OTHER LINKS FOR DEEPER VIEWS
            <li class="nav-item">
              <a class="nav-link" href="../html/bugtrack.html">Bug Tracking</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../html/tasktrack.html">Task Tracking</a>
            </li>
          -->
          </ul>
        </nav>

<!--MAIN CONTENT-->

    <div class="container-fluid">
      <div class="row">
         <nav class="col-sm-3 col-md-2 d-none d-sm-block bg-light sidebar">
          <ul class="nav nav-pills flex-column">
            <li class="nav-item">
              <a class="nav-link" href="../html/projectoverview.html"></a>
            </li>
<!---
            <li class="nav-item">
              <a class="nav-link" href="../html/bugtrack.html">Bug Tracking</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="../html/tasktrack.html">Task Tracking</a>
            </li>
          </ul>
-->
        </nav>
		
<!--PHP-->	  
<?php
$link = mysqli_connect("localhost", "zaval035", "q29A05", "zaval035");

if (!$link) {
    echo "Error: Unable to create account" . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

echo "You have created an account!" . PHP_EOL;


// Escape user inputs for security
$UserID = mysqli_real_escape_string($link, $_REQUEST['UserID']);
$Username = mysqli_real_escape_string($link, $_REQUEST['Username']);
$FName = mysqli_real_escape_string($link, $_REQUEST['FName']);
$LName = mysqli_real_escape_string($link, $_REQUEST['LName']);
$Password = mysqli_real_escape_string($link, $_REQUEST['Password']);
$Email = mysqli_real_escape_string($link, $_REQUEST['Email']);



$UserID = isset($_COOKIE["SDOT_user_login"]);
 
// attempt update query execution
$sql = "UPDATE Users SET Username = '".$Username."', FName = '".$FName."', LName = '".$LName."', Password = '".$Password."', Email = '".$Email."'  
WHERE UserID =  '" . $UserID . "'";

if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

mysqli_close($link);
?>	

<!--MAIN CONTENT DIV-->
        <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
          <h1>Profile Preferences {s.dot}
          <img src="../images/sdot.png" width="autp" height="50" align="text-center"></h1>


<!--USER PROFILE FORM-->
    <form action= "UserPreferences.php" id = "usersPref"  action ="post" >
        <div class="table-responsive">
            <table class="table table-striped">
          <h3>Update your profile information</h3>
       <label>
              <thead>
                <tr>
                  <th>First Name:</th>
                  <td>
                    <input type = "text" id="first" size = "45" placeholder="Enter first name">
                  </td>
                </tr>
              </label>
              </thead>
      
       <label>
              <thead>
                <tr>
                  <th>Last Name:</th>
                  <td>
                    <input type = "text" id="last" size = "45" placeholder="Enter last name">
                  </td>
                </tr>
              </label>
              </thead>
      
       <label>
              <thead>
                <tr>
                  <th>Username:</th>
                  <td>
                    <input type = "text" id="username" size = "45" placeholder="Enter username">
                  </td>
                </tr>
              </label>
              </thead>
      
       <label>
              <thead>
                <tr>
                  <th>Email:</th>
                  <td>
                    <input type = "text" id="email" size = "45" placeholder="Enter email">
                  </td>
                </tr>
              </label>
              </thead>
      
              <label>
              <thead>
                <tr>
                  <th>Password:</th>
                  <td>
                    <input type = "password" id="intialp" size = "45" placeholder="Enter password">
                  </td>
                </tr>
              </label>
              </thead>

                <label>
              <tbody>
                <tr>
                  <th>Re-Enter Password:</th>
                  <td>
                    <input type = "password" id="secondp" size = "45" placeholder="Re-enter password"/>
                  </td>
                </tr>                                
                <label>
              </tbody>
            </table>

        <input type= "submit" class="btn btn-lg btn-primary"  name="sumbit" value="UPDATE">
        <input type= "reset" class="btn btn-lg btn-primary" name="reset" value="RESET">

      </form>
<!--END USER PROFILE FORM--> 


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
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>
 
