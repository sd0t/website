<!--
    SIGN UP
    ** DENISE THUY VY NGUYEN 
    http://cis444.cs.csusm.edu/nguye208/sdot/html/signup/signup.html
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

    <title>{s.dot} Sign Up</title>
    <link rel="icon" href="../../images/sdot.png" />

<!--JS-->
    <script type = "text/javascript"  src = "signup.js">
    </script>


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
        <a class="navbar-brand" href="../../Resources/html/about.html">
        <img src="../../Resources/images/sdot.png" width="autp" height="25" align="text-center">
          {s.dot}
        </a>
        
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
         <ul class="navbar-nav">
           </li>
            <a class="nav-link" href="../../Resources/html/about.html">About</a>
          </li>
            <li class="nav-item active">
            <a class="nav-link" href="../../Users/NewUser/signup.html">Sign Up<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../../Users/login.html">Log In</a>
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


<!--START BODY FORM-->
<div class="body_container">
    <div class="main_body">
    <div class="container">
      <div class="row">
        <div class="jumbotron mt-4 .col-6 .col-md-4">

          <p id="main_content">
            <img src="../../Resources/images/sdot.png" width="autp" height="250" align="text-center"></br>{s.dot}
          </p>

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
 
// attempt insert query execution
$sql = "INSERT INTO Users (Username, FName, LName, Password, Email) VALUES ('$Username', '$FName','$LName', '$Password', '$Email')";
if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

mysqli_close($link);
?>	
	
	
<!--NEW SIGNUP FORM-->
          <h2>Account Created</h2>
    <form action= "signup.php" id = "myForm"  action ="post" >
        <div class="table-responsive">
            <table class="table table-striped">
			
			 <label>
              <thead>
                <tr>
                  <th></th>
                  <td>
                    <?php echo $_POST["FName"]; ?>
                  </td>
                </tr>
              </label>
              </thead>
			
			 <label>
              <thead>
                <tr>
                  <th></th>
                  <td>
                    <?php echo $_POST["LName"]; ?>
                  </td>
                </tr>
              </label>
              </thead>
			
			 <label>
              <thead>
                <tr>
                  <th></th>
                  <td>
                   <?php echo $_POST["Username"]; ?>
                  </td>
                </tr>
              </label>
              </thead>
			
			 <label>
              <thead>
                <tr>
                  <th></th>
                  <td>
                    <?php echo $_POST["Email"]; ?>
                  </td>
                </tr>
              </label>
              </thead>
			
              <label>
              <thead>
                <tr>
                  <th></th>
                  <td>
                 <?php echo $_POST["Password"]; ?>
                  </td>
                </tr>
              </label>
              </thead>

                <label>
              <tbody>
                <tr>
                  <th></th>
                  <td>
                    <?php echo $_POST["Password"]; ?>
                  </td>
                </tr>                                
                <label>
              </tbody>
            </table>

      </form>
<!--END NEW SIGNUP FORM--> 
          </div>
    </div>

     </div>
</div>


          </div>
        </main>
      </div>
    </div>

  </body>
</html>


<!-- Bootstrap core JavaScript-->
    <script type = "text/javascript"  src = "signupr.js"></script>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>

