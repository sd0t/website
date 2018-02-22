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

 
<!-- MAIN BODU 
  User will create a new project
-->
        <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
          <h1>Create New Task
            <img src="../images/sdot.png" width="autp" height="50" style="text-align:center"></h1>
       
            <section class="row text-center placeholders">

          </section>

<!--NEW TASK FORM-->
            <form action ="addTask.php" id="myForm" method="post">
           <h2>Adding new task</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Priority:</th>
                  <td>
		    <select name="Priority" id = "priority" >
		      <option value = "Low"> Low </option>
		      <option value = "Medium"> Medium </option>
		      <option value = "High"> High </option>
		      </select> Enter in how important this task is

                  </td>
                </tr>
              </thead>

              <tbody>
                <tr>
                  <th>Task:</th>
                  <td>
                    <input type = "text" id="task" size = "60" name = "Task" placeholder="Enter in task" onchange=""/>
                  </td>
                </tr>


                  <tr>
                  <th>Assigned To:</th>
                   <td>
                    <select name = "assigned_user_select" id="assigned_user_select" multiple="multiple">
                    <!-- <input type = "text" id="assigned" size = "60" name = "TAssignedID" placeholder="Enter in who it is assigned to" onchange=""/> -->

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
                  <th>Completion:</th>
                   <td>
                    <!-- <input type = "text" id="completion" size = "60" name = "Complete" placeholder="" onchange=""/> -->
                    <select name= "Complete" id = "completion">
                      <option value = "true"> Compleated </option>
                      <option value = "false"> Incompleat </option>
                    </select>
                  </td>
                </tr>


                <tr>
                  <th>Scrum:</th>
                   <td>
                    <input type = "number" id="scrum1" size = "60" name = "SCRUM" placeholder="" onchange=""/>
                  </td>
                </tr>

                <tr>
                  <th>Remarks:</th>
                   <td>
                    <input type = "text" id="scrum2" size = "60" name = "Remarks" placeholder="Enter in remarks about task" onchange=""/>
                  </td>
                </tr>

              </tbody>
            </table>
          </div>

         <input type = "submit" class="btn btn-lg btn-primary" name = "submit" value="ADD TASK">
        <input type= "reset" class="btn btn-lg btn-primary" name="reset" value="CLEAR">
   
      </form>
<!--END NEW TASK FORM-->

        </main>





<!-- Bootstrap core JavaScript-->
<script type = "text/javascript"  src = "newTask.js"></script>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../../Resources/js/popper.min.js"></script>
    <script src="../../../Resources/js/bootstrap.min.js"></script>
  </body>
</html>
