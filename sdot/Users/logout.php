<!--LOGOUT
  LOGOUT {s.dot}
  http://public.csusm.edu/mettavy/sdot/Users/logout.html
  
  ** DENISE THUY VY NGUYEN 
  http://cis444.cs.csusm.edu/nguye208/sdot/html/logout.html  
  ** =^.,.^= 10-23-2-17
-->
<!doctype html>
<?php 
  setcookie("SDOT_user_login", "" , time() + (-86400), "/"); 
  setcookie("SDOT_user_project", "" , time() + (-86400), "/"); 
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">
 <title>{s.dot} Logout</title>
      <link rel="icon" href="./Resources/images/sdot.png" />

  <!--BOOTSTRAP-->
      <link href="../Resources/css/bootstrap.min.css" rel="stylesheet">
      <!-- Custom styles for this template -->
      <link href="../Resources/css/sdot.css" rel="stylesheet">
      <link href="../Resources/css/dashboard.css" rel="stylesheet">
    </head>

  <body>
    <header>
<!--TOP NAV-->
     <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
       <a class="navbar-brand" href="../Resources/html/about.html">
        <img src="../Resources/images/sdot.png" width="autp" height="25" align="text-center">
      {s.dot}
    </a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

<!--TOP NAV-->
        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="../Resources/html/about.html">About</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="NewUser/signup.html">Sign Up</a>
          </li>
          <li class="nav-item">
             <a class="nav-link" href="../Users/login.html">Log In</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link active" href="logout.html">Logout</a>
          </li>
        </ul>
        </div>
      </nav>
    </header>

    <div class="container-fluid">
        <div class="row">
            </ul>
          </nav>

<!--MAIN CONTENT-->
  <div class="body_container">
    <div class="main_body">
     <p id="main_content">
      <div class="jumbotron mt-4 .col-6 .col-md-4">
                  <h1>{s.dot}</h1>
          <section class="row text-center placeholders">
                    <img src="../Resources/images/sdot.png" width="autp" height="400" align="text-center">
          </section>
          <p>
            Thanks for using {s.dot}  </br>
          </p>  

          <script>
           window.setTimeout(function(){
        // Move to a new location or you can do something else
        window.location.href = "login.html";

          }, 5000);
      </script>

      </div>
    </div>
  </body>
</html>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../Resources/js/popper.min.js"></script>
    <script src="../Resources/js/bootstrap.min.js"></script>

