
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
            <a class="nav-link" href="../../Project/CreateProject/createProject.php">Create Project</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../../Project/ProjectHub/ProjectOverview/chooseProject.php">Choose Project</a>
          </li>
         <li class="nav-item">
            <a class="nav-link active" href="usersPreferences.php">User Preferences</a>
          </li>
          <li>
            <a class="nav-link" href="../logout.php">Logout</a>
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
              <a class="nav-link active" href="../html/projectoverview.html"></a>
            </li>
          </ul>
        </nav>

<!--MAIN CONTENT-->

<!-- MAIN BODU 
  User will create a new project
-->
        <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
          <h1>Create New Bug Task
            <img src="../images/sdot.png" width="autp" height="50" style="text-align:center"></h1>
       
            <section class="row text-center placeholders">

          </section>
		  
<!--PHP-->	  
<?php

  //if cookies don't exist resend to login 
  if(isset($_COOKIE["SDOT_user_pref"])) {
    $BProjectID = $_COOKIE["SDOT_user_pref"];
  }
  else {
    echo "<script type='text/javascript'>
           window.location = '../../../Users/logout.html'
    </script>";
  }

$link = mysqli_connect("localhost", "group_e", "sdotDB", "group_e");

if (!$link) {
    echo "Error: Unable to edit" . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

echo "You have edited your profile!" . PHP_EOL;


// Escape user inputs for security
$FName = mysqli_real_escape_string($link, $_POST['FirstName']);
$LName = mysqli_real_escape_string($link, $_POST['LastName']);
$Username = mysqli_real_escape_string($link, $_POST['UserName']);
$Email = mysqli_real_escape_string($link, $_POST['Email']);
$Password = mysqli_real_escape_string($link, $_POST['Password']);
$Password = mysqli_real_escape_string($link, $_POST['RePassword']);

// attempt insert query execution
$sql = "INSERT INTO Users (Username,FName,LName,Password,Email)  
VALUES ('". $FName ."','". $LName ."','". $Username ."','". $Email ."','". $Password ."')";
if(mysqli_query($link, $sql)){
    echo "Edit added successfully.";
} else{
    echo "ERROR: Couldn't Edit $sql. " . mysqli_error($link);
}

mysqli_close($link);
?>		

 <script>
  // return to tasktracking after task added.
  $('').click (function (e) {
   e.preventDefault(); //will stop the link href to call the blog page

   setTimeout(function () {
       window.location.href = "userPreferences.php"; //will redirect to your blog page (an ex: blog.html)
    }, 5000); //will call the function after 2 secs.

});

  </script>
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
