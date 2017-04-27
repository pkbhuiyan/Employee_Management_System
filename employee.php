
<!-- === -->

<?php

session_start();
if($_SESSION['login'] != "True")
{
  $error="Sorry You Have To Login First.";
  echo("<script>alert(\"$error\")</script>");
  echo("<script>location.href='home.php'</script>");
}

else
{
  if($_SESSION['user_Role'] == "Admin")
  {
    $error="Sorry You Cannot View This Page.";
    echo("<script>alert(\"$error\")</script>");
    echo("<script>location.href='admin.php'</script>");
  }
  else
  {
    $e_id = $_SESSION['e_id'];

    include ('pdo-connection.php');
    include ('database-config.php');

    $dbuser= $database_user;
    $dbpass = $database_pass;
    $dbname = $database_name;

    $dbcon = $connection_object->connection('localhost',$dbname,$dbuser,$dbpass);
  }
}
?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset=utf-8 />
    <title>EMS</title>
    <link rel="stylesheet" type="text/css" href="employee.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <!-- FontAwesome  File Link -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

  </head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">
  <!-- navigation bar start -->

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="home.php">EMS</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li class="active"><a href="employee.php">Home</a></li>
        <li><a href="checkINem.php">CheckIN</a></li>
        <li><a href="employeeProfile.php">MyProfile</a></li>
         <li><a href="logout.php">LogOut</a></li>
     
      </ul>
    </div>
  </div>
</nav>

  
<h2 style="margin-top: 200px;margin-left: 300px;">Thanks for coming office ! <br>

have nice day 

</h2>


 
  </body>
</html>