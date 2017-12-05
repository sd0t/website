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
            <li class="nav-item ">
              <a class="nav-link " href="../BugTracking/bugtrack.php">Bug Tracker</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link active" href="../TaskTracking/tasktrack.php">Task Tracker</a>
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
    <h1>Edit Task</h1>
    <section class="row text-center placeholders">

    </section>
  <?php

  if(isset($_COOKIE["SDOT_user_login"])) {
    $UserID = $_COOKIE["SDOT_user_login"];
  }
  else {
    echo "<script type='text/javascript'>
           window.location = '../../../Users/login.html'
    </script>";
  }

    // get the Task ID and Project ID
    if(isset($_COOKIE["SDOT_user_project"])) {
      $ProjectID = $_COOKIE["SDOT_user_project"];
    }
    else {
      echo "<script type='text/javascript'>
           window.location = '../ProjectOverview/chooseProject.php'
      </script>";
    }

    //$TaskID = $_POST['taskID'];

    $conn = mysqli_connect("localhost", "group_e", "sdotDB", "group_e");

    if (!$conn) {
      echo "Error: Unable to create Bug" . PHP_EOL;
      echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
      echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
      exit;
    }

    //QUERY SUBMIT
    $TaskID = $_POST['taskID'];

    $queryString = "SELECT TaskID, Priority, Task, Complete, Username, SCRUM, Remarks 
                    FROM Tasks, Users 
                    WHERE (TProjectID = " . $ProjectID . ") AND (TaskID = " . $TaskID . ") AND (UserID = TAssignedID);";
    if($result = mysqli_query($conn, $queryString)){
      while($row = mysqli_fetch_array($result)){

        $priorityLevel = $row[1];
        $taskName = $row[2];
        $CompleationLevel = $row[3];
        $AssignedTo = $row[4];
        $ScrumNum = $row[5];
        $RemarkString = $row[6];

        echo "<form action = 'submitEditTask.php' id = 'EditTaskForm' method = 'post'>
             <h2>". $taskName ."(ID: ". $TaskID .")</h2>
              <div class='table-responsive'>
                <table class='table table-striped'>
                  <thead>
                    <tr>
                      <th>Priority:</th>
                        <td>
                          <select name='Priority' id = 'priority' value=". $priorityLevel .">
                            <option value = 'Low'> Low </option>
                            <option value = 'Medium'> Medium </option>
                            <option value = 'High'> High </option>
                          </select> Enter in how important this task is
                        </td>
                    </tr>
                  </thead>

              <tbody>
                <tr>
                  <th>Task:</th>
                  <td>
                    <input type = 'text' id='task' size = '60' name = 'Task' value= ". $taskName ." onchange=''/>
                  </td>
                </tr>

                <tr>
                  <th>Assigned To:</th>
                  <td>
                    <select name = 'userSelect' id='userSelect' multiple='multiple'>";

        $sql = "SELECT UserID, FName, LName FROM Users";
        if ($result2=mysqli_query($conn,$sql)){
          while ($row2=mysqli_fetch_row($result2)){
                        
            echo "<option value = " .$row2[0]. ">" . $row2[1] . ", " . $row2[2]. "</option>";
          }
          mysqli_free_result($result2); 
        }

               echo " <option value=". $AssignedTo ." Selected='selected'> Original Entry: ". $AssignedTo ." </option>
                    </select>
                  </td>
                </tr>

                <tr>
                  <th>Completion:</th>
                   <td>
                    <!-- <input type = 'text' id='completion' size = '60' name = 'Complete' placeholder='' onchange=''/> -->
                    <select name= 'Complete' id = 'completion' value = ". $CompleationLevel .">
                      <option value = 'true'> Compleated </option>
                      <option value = 'false'> Incompleat </option>
                    </select>
                  </td>
                </tr>

                <tr>
                  <th>Scrum:</th>
                   <td>
                    <input type = 'number' id='scrum1' size = '60' name = 'SCRUM' value=". $ScrumNum ." onchange=''/>
                  </td>
                </tr>

                <tr>
                  <th>Remarks:</th>
                   <td>
                    <input type = 'text' id='scrum2' size = '60' name = 'Remarks' value=". $RemarkString ." onchange=''/>
                  </td>
                </tr>

                <tr> 
                  <input id='hiddentaskID' type='hidden' name='taskID' value=". $TaskID .">
                  <input type = 'submit' class='btn btn-lg btn-primary' name = 'submit' value='Submit'>
                  <input type= 'reset' class='btn btn-lg btn-primary' name='reset' value='Clear'>
                </tr>
              </tbody>
            </table>
          </div>
        </form>
         ";

      }
      mysqli_free_result($result);
    }
    else {
      echo "ERROR: " . mysqli_error($conn);
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

