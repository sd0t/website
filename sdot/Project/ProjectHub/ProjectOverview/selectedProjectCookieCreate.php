
<?php

  //this is to store the project id.
  $project_ID_cookie_Name = "SDOT_user_project";
  $project_ID_information  = $_POST['idProject'];
  setcookie($project_ID_cookie_Name, $project_ID_information, time() + (86400), "/");
	
  // redirect user to selectedProject page 
  echo "<script type='text/javascript'>
           window.location = 'selectedProject.php'
    </script>";   

?>

<html>
<head>
</head>
<body>
</body>
</html>
