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

<!--MAIN CONTENT DIV-->
<main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
    <h1>Edit Bug</h1>
    <section class="row text-center placeholders">

    </section>
  <?php

    // get the Task ID and Project ID
    if(isset($_COOKIE["SDOT_user_project"])) {
      $ProjectID = $_COOKIE["SDOT_user_project"];
    }
    else {
      echo "<script type='text/javascript'>
           window.location = '../ProjectOverview/chooseProject.php'
      </script>";
    }

    $conn = mysqli_connect("localhost", "group_e", "sdotDB", "group_e");

    if (!$conn) {
      echo "Error: Unable to create Bug" . PHP_EOL;
      echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
      echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
      exit;
    }

    $BugID = $_POST['bugID'];

    //QUERY SUBMIT
    $queryString = "SELECT BugID, Users1.Username, Users2.Username, SourceFile, Location, Description, Status FROM Bugs, Users Users1, Users Users2 WHERE (BProjectID = " . $ProjectID. ") AND (BugID = " . $BugID. ") AND (Users1.UserID =  BReporterID) AND (Users2.UserID = BAssignedID);";
    if($result = mysqli_query($conn, $queryString)){
      if($row = mysqli_fetch_array($result)){

        $Users1Username = $row[1];
        $Users2Username = $row[2];
        $SourceFile = $row[3];
        $Location = $row[4];
        $Description = $row[5];
        $Status = $row[6];

        echo "<form action ='submitEditBug.php' id='myForm' method='post'>
           <h2>Bug ID: ". $BugID ."</h2>
          <div class='table-responsive'>
            <table class='table table-striped'>
              <thead>
                <tr>
                  <th>Reporter:</th>
                  <td>
                    <select name = 'BReporterID' id='BReporterID' multiple='multiple' value = ". $Users1Username .">";

                     
                      $sql = "SELECT UserID, FName, LName FROM Users";
                      if ($result2=mysqli_query($conn,$sql)){
                        while ($row2=mysqli_fetch_row($result2)){
                        
                        echo "<option value = " .$row2[0]. ">" . $row2[1] . ", " . $row2[2]. "</option>";
                        }
  
                        mysqli_free_result($result2);
                      }

                  echo "
                  </select>
                  </td>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th>Assigned to:</th>
                  <td>
                    <select name = 'BAssignedID' id='BAssignedID' multiple='multiple' value = ". $Users2Username ."> ";

                      if ($result3=mysqli_query($conn,$sql)){
                        while ($row3=mysqli_fetch_row($result3)){
                        
                        echo "<option value = " .$row3[0]. ">" . $row3[1] . ", " . $row3[2]. "</option>";
                        }
  
                        mysqli_free_result($result3);
                      }

                  echo "
                </select>
                  </td>
                </tr>
                  <tr>
                  <th>Source File:</th>
                   <td>
                    <input type = 'text' id='source' size = '60' name = 'SourceFile' value = ". $SourceFile ." onchange=''/>
                  </td>
                </tr>

                <tr>
                  <th>Location:</th>
                   <td>
                    <input type = 'text' id='location' size = '60' name = 'Location' value = ". $Location ." onchange=''/>
                  </td>
                </tr>


                <tr>
                  <th>Description:</th>
                   <td>
                    <input type = 'text' id='description' size = '60' name = 'Description' value = ". $Description ." onchange=''/>
                  </td>
                </tr>

              <tr>
                <th>Status:</th>
                   <td>
                    <select name= 'Status' id = 'Status' value = ". $Status .">
                      <option value = 'Low Priority'> Low Priority </option>
                      <option value = 'Med Priority'> Med Priority </option>
                      <option value = 'High Priority'> High Priority </option>
                    </select>
                  </td>
                </tr>

              </tbody>
            </table>
          </div>
    <input id='hiddenBugID' type='hidden' name='BugID' value=". $BugID .">
    <input type = 'submit' class='btn btn-lg btn-primary' name = 'submit' value='Submit'>
    <input type= 'reset' class='btn btn-lg btn-primary' name='reset' value='Clear'>
         
      </form>
         ";

      }
      mysqli_free_result($result);
    }
    else {
      echo "ERROR: " . mysqli_error($conn);
      mysqli_free_result($result);
    }

  mysqli_close($conn);
  ?>

  <!--
  <form action = "deleteTask.php" id = "deleteTaskForm" method = "post">
    Delete Task:
    <input type="radio" id="deleteconfermation" value="false" />
    <input type = "submit" class="btn btn-lg btn-primary" name = "submit" value="EDIT TASK">
  </form>
  -->

</main>
<!--END MAIN CONTENT-->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>

