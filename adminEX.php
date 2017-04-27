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
  if($_SESSION['user_Role'] != "Admin")
  {
    $error="Sorry You Cannot View This Page.";
    echo("<script>alert(\"$error\")</script>");
    echo("<script>location.href='home.php'</script>");
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



$sql = "SELECT * FROM login_info,employee_personal_info,employee_professional_info WHERE login_info.Employee_id = '$e_id' AND employee_personal_info.id = '$e_id' AND employee_professional_info.id = '$e_id'";
$data = $dbcon->query($sql);
$row = $data->fetch(PDO::FETCH_ASSOC);
$name = $row['Name'];
$id = $row['id'];
$nid = $row['NID'];
$department = $row['Department'];
$designation = $row['Designation'];
$email = $row['Email'];
$contact = $row['Phone'];
$address = $row['Adress'];
$gender = $row['Gender'];
$blood_group = $row['Blood_group'];
$dob = $row['Date_of_Birth'];
$jd = $row['Joining_date'];
$image = $row['Image'];

          

    }
  }

?>






<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="myProfile.css">
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
 <!--====font awessome======  -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<!-- jQuery library -->
<!-- Latest compiled JavaScript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</head>
<body>
  <!-- navigation bar start -->

<div id="custom-bootstrap-menu" class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header"><a class="navbar-brand" href="home.php">EMS</a>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-menubuilder"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse navbar-menubuilder">
            <ul class="nav navbar-nav navbar-right">
               <li><a href="checkIN.php">CheckIN</a>
                </li>
                <li><a href="attendence.php">Attendence</a>
                </li>
                <li><a href="myProfile.php">MyProfile</a>
                </li>
                <li><a href="addEmployee.php">AddEmploye</a>
                </li>
                <li><a href="employeeStatus.php">EmployeeStaus</a>
                </li>
                <li><a href="leaveManagement.php">Leave mangement</a>
                </li>
                <li><a href="workingHr.php">Working Hr.</a>
                </li>
                <li><a href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</div>