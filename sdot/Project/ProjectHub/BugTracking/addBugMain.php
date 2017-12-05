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
            <li class="nav-item active">
              <a class="nav-link active" href="../BugTracking/bugtrack.php">Bug Tracker</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../TaskTracking/tasktrack.php">Task Tracker</a>
            </li>             
          </ul>
        </nav>
      </div>
    </div>

 

<!-- MAIN BODU 
  User will create a new project
-->
        <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
          <h1>Create New Bug Task
            <img src="../images/sdot.png" width="autp" height="50" style="text-align:center"></h1>
       
            <section class="row text-center placeholders">

          </section>

<!--NEW BUG FORM-->
         <form action ="addBug.php" id="myForm" method="post">
           <h2>Adding new bug task</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Reporter:</th>
                  <td>
                    <!-- <input type = "text" id="reporter" size = "60" name = "BReporterID" placeholder="Enter in your name" 
                    onchange=""/> -->

                    <select name = "BReporterID" id="BReporterID" multiple="multiple">

                    <?php

                      $conn = mysqli_connect("localhost", "group_e", "sdotDB", "group_e");

                      if (!$conn) {
                        echo "Error: Unable to connect to MySQL." . PHP_EOL;
                        echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
                        echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
                        exit;
                      }

                      $sql = "SELECT UserID, FName, LName FROM Users";

                      if ($result=mysqli_query($conn,$sql)){
                        while ($row=mysqli_fetch_row($result)){
                        
                        echo "<option value = " .$row[0]. ">" . $row[1] . ", " . $row[2]. "</option>";
                        }
  
                        mysqli_free_result($result);
                      }

                      mysqli_close($link);  

                    ?>
                  </select>


                  </td>
                </tr>
              </thead>

              <tbody>
                <tr>
                  <th>Assigned to:</th>
                  <td>
                    <!-- <input type = "text" id="assigned" size = "60" name = "BAssignedID" placeholder="Enter who will work on bug" onchange=""/> -->
                    <select name = "BAssignedID" id="BAssignedID" multiple="multiple">

                    <?php

                      $conn = mysqli_connect("localhost", "group_e", "sdotDB", "group_e");

                      if (!$conn) {
                        echo "Error: Unable to connect to MySQL." . PHP_EOL;
                        echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
                        echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
                        exit;
                      }

                      $sql = "SELECT UserID, FName, LName FROM Users";

                      if ($result=mysqli_query($conn,$sql)){
                        while ($row=mysqli_fetch_row($result)){
                        
                        echo "<option value = " .$row[0]. ">" . $row[1] . ", " . $row[2]. "</option>";
                        }
  
                        mysqli_free_result($result);
                      }

                      mysqli_close($link);  

                    ?>
                  </select>

                  </td>
                </tr>


                  <tr>
                  <th>Source File:</th>
                   <td>
                    <input type = "text" id="source" size = "60" name = "SourceFile" placeholder="Enter the source file" onchange=""/>
                  </td>
                </tr>

                <tr>
                  <th>Location:</th>
                   <td>
                    <input type = "text" id="location" size = "60" name = "Location" placeholder="Enter in where the location is" onchange=""/>
                  </td>
                </tr>


                <tr>
                  <th>Description:</th>
                   <td>
                    <input type = "text" id="description" size = "60" name = "Description" placeholder="Enter in how bug description" onchange=""/>
                  </td>
                </tr>

              <tr>
                <th>Status:</th>
                   <td>
                    <select name= "Status" id = "Status">
                      <option value = "Low Priority"> Low Priority </option>
                      <option value = "Med Priority"> Med Priority </option>
                      <option value = "High Priority"> High Priority </option>
                    </select>
                  </td>
                </tr>

              </tbody>
            </table>
          </div>
		<input type = "submit" class="btn btn-lg btn-primary" name = "submit" value="ADD BUG">
    <input type= "reset" class="btn btn-lg btn-primary" name="reset" value="CLEAR">
         
      </form>
<!--END NEW BUG FORM-->

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
