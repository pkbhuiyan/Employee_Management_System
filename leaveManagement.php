<?php
  include ('pdo-connection.php');
    include ('database-config.php');
   $dbuser= $database_user;
    $dbpass = $database_pass;
    $dbname = $database_name;

    $dbcon = $connection_object->connection('localhost',$dbname,$dbuser,$dbpass);
    $var='';


?>




<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
  <link rel="icon" type="image/png" href="assets/img/favicon.ico">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <link rel="stylesheet" type="text/css" href="myProfile.css">
  <title>Fresh Bootstrap Table by Creative Tim</title>
<link rel="stylesheet" type="text/css" href="leaveManagement.css">
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />

    <!--     Fonts and icons     -->
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
 <!--====font awessome======  -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<!-- jQuery library -->
<!-- Latest compiled JavaScript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>

<body style="padding-top: 100px;">
 <!-- navigation bar start -->

<div id="custom-bootstrap-menu" class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header"><a class="navbar-brand" href="#">EMS</a>
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
<div class="wrap ">
<form action="" method="post" class="class-1">
	<div class="ssearch">
    <input  name="input" class=" search_bar"  placeholder="EmployeeId">
    <input type="submit" name="search_btn" class="bar btn-primary" value="Search">
    </div>
        <?php 
 
if (isset($_POST['search_btn'])) {
  
  # code...
  $Id=$_POST['input'];
  if ($Id == '') {
    # code...
    echo " Please give an ID";
  }else {
    # code...
    $select1 = " SELECT * FROM employee_professional_info WHERE id='$Id' ";
    $data1 = $dbcon->query($select1);
    $row = $data1->fetch(PDO::FETCH_ASSOC);
    $var=$row['leave_remaining'];
  }
}
?>
    <div class="up"> 
    <input  class="search_bar"  name="leave" type="text" placeholder="Leave Remaining" value="<?php echo $var; ?>"> 
    <input type="submit" name="update" class="update btn-success" value="Update">
    </div>
</form>
<?php 
if (isset($_POST['update'])) {
  # code...

  $Id=$_POST['input'];
  $leave=$_POST['leave'];
  $update="UPDATE employee_professional_info  SET leave_remaining='$leave'  WHERE id='$Id' ";
  if ($data=$dbcon->query($update)) {
    # code...
     $str = 'your information hass been update';
     echo "<script>alert(\"$str\")</script>";
     // echo "<script>location.href='leaveManagement.php'</script>";
  }
 
}


?>
</div>
</body>
</html>