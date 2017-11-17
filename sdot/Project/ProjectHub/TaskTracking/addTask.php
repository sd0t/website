<!--
  ADD TASK {s.dot}
  http://cis444.cs.csusm.edu/nguye208/sdot/html/addTask.html

   DENISE THUY VY NGUYEN 
   =^.,.^= 10-23-2017
—>
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
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!— Custom styles for this template —>
    <link href="../css/sdot.css" rel="stylesheet">
    <link href="../css/dashboard.css" rel="stylesheet">
  </head>

  <body>
    <header>
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      


        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="../html/index.html">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="../html/newprojects.html">New Project</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../html/viewprojects.html">Choose Project</a>
          </li>
         <li class="nav-item">
            <a class="nav-link" href="../html/settings.html">User Preference</a>
          </li>
        </ul>
        <!--SEARCH FUNCTION
          <form class="form-inline mt-2 mt-md-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
        —>
        </div>
      </nav>
    </header>

    <div class="container-fluid">
      <div class="row">
         <nav class="col-sm-3 col-md-2 d-none d-sm-block bg-light sidebar">
          <ul class="nav nav-pills flex-column">
            <li class="nav-item">
              <a class="nav-link" href="../html/projectoverview.html">Overview</a>
            </li>
            <!—
            <li class="nav-item">
              <a class="nav-link" href="../html/bugtrack.html">Bug Tracking</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../html/tasktrack.html">Task Tracking</a>
            </li>
          —>
          </ul>
        </nav>

<!— MAIN BODU 
  User will create a new project
—>
        <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
          <h1>Create New Task
            <img src="../images/sdot.png" width="autp" height="50" style="text-align:center"></h1>
       
            <section class="row text-center placeholders">

          </section>

<!--ESTABLISH CONNECTION-->

<?php
$link = mysqli_connect("localhost", "zaval035", "q29A05", "zaval035");

if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

echo "Success: A proper connection to MySQL was made! The my_db database is great." . PHP_EOL;
echo "Host information: " . mysqli_get_host_info($link) . PHP_EOL;
 // Escape user inputs for security
$priority = mysqli_real_escape_string($link, $_REQUEST['priority']);
$task = mysqli_real_escape_string($link, $_REQUEST['task']);
$assigned = mysqli_real_escape_string($link, $_REQUEST['assigned']);
$completion = mysqli_real_escape_string($link, $_REQUEST['completion']);
$scrum = mysqli_real_escape_string($link, $_REQUEST['scrum']);
$scrumtwo = mysqli_real_escape_string($link, $_REQUEST['scrum2']);
 
// attempt insert query execution
$sql = "INSERT INTO newtask (newtask_id,priority, task, assigned, completion, scrum, scrumtwo) VALUES ('1','$priority', '$task', '$assigned','$completion', '$scrum', '$scrumtwo')";
if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

mysqli_close($link);



?>

        <!--NEW TASK FORM-->
          <form id="myForm">
           <h2>Adding new task</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Priority:</th>
                  <td>      
          <?php echo $_POST["Priority"]; ?>
                  </td>
                </tr>
              </thead>

              <tbody>
                <tr>
                  <th>Task:</th>
                  <td>
           <?php echo $_POST["task"]; ?>
                  </td>
                </tr>
                  <tr>
                  <th>Assigned To:</th>
                   <td>
                    <?php echo $_POST["assigned"]; ?>
                  </td>
                </tr>

                <tr>
                  <th>Completion:</th>
                   <td>
                   <?php echo $_POST["completion"]; ?>
                  </td>
                </tr>


                <tr>
                  <th>Scrum:</th>
                   <td>
                    <?php echo $_POST["scrum1"]; ?>
                  </td>
                </tr>

                <tr>
                  <th>Scrum:</th>
                   <td>
                    <?php echo $_POST["scrum2"]; ?>
                  </td>
                </tr>

              </tbody>
            </table>
          </div>

          <a class="btn btn-lg btn-primary" role="button" value="GetTask" onclick="createTask()">
          Add Task 
        </a>
        <a class="btn btn-lg btn-primary"  type="button" value="reset" onclick="clearProject()">
          Clear
        </a>
        <a class="btn btn-lg btn-primary" href="../html/addBug.html" role="button">
        Add A Bug
      </a>
      </form>
<!--END NEW TASK FORM-->

        </main>
      </div>
    </div>

          
          </div>
        </main>
      </div>
    </div>

<!— Bootstrap core JavaScript-->
<script type = "text/javascript"  src = "../js/newTask.js"></script>

    <!— Bootstrap core JavaScript
    ================================================== —>
    <!— Placed at the end of the document so the pages load faster —>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>
