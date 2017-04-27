<?php 
 //head


    
    $ID=$_GET['id'];
    include ('pdo-connection.php');
    include ('database-config.php');

    $dbuser= $database_user;
    $dbpass = $database_pass;
    $dbname = $database_name;

    $dbcon = $connection_object->connection('localhost',$dbname,$dbuser,$dbpass);



$sql = "SELECT * FROM employee_personal_info,employee_professional_info WHERE   employee_personal_info.id = '$ID' AND employee_professional_info.id = '$ID'";
$data = $dbcon->query($sql);
$row = $data->fetch(PDO::FETCH_ASSOC);
$name = $row['Name'];
$id = $row['id'];
$department = $row['Department'];
$designation = $row['Designation'];
$salary=$row['Salary'];
$acc=$row['Account_no'];
$leave=$row['leave_remaining'];

?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <link rel="icon" type="image/png" href="assets/img/favicon.ico">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  
  <title>Fresh Bootstrap Table by Creative Tim</title>
<link rel="stylesheet" type="text/css" href="edit.css">
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
<body class="container">

<form action="" method="post">
                                <div class="head" style="position:relative;left:45%;">
                                   <h4 class="" text-align="center">Personal Information</h4>
                                </div>
                                <hr>
                        <div class="table" style="position:relative;left:20%;">
                           <table border="1" style="width:60%;text-align:center;">
                              <tr>
                                 <td><strong>Name :</strong></td>
                                 <td><h4><?php echo $name ?></h4></td>
                              </tr>
                              <tr>
                                 <td><strong>Employee ID :</strong></td>
                                 <td><h4><?php echo $id ?></h4></td>
                              </tr>
                              <tr>
                                 <td><strong>Departmanet :</strong></td>
                                 <td><h4><?php echo $department ?></h4></td>
                              </tr>
                              <tr>
                                 <td><strong>Designation :</strong></td>
                                 <td><h4><?php echo $designation ?></h4></td>
                              </tr>
                              <tr>
                                 <td><strong>Salary :</strong></td>
                                 <td><h4><?php echo $salary ?></h4></td>
                              </tr>
                              <tr>
                                 <td><strong>Account :</strong></td>
                                 <td><h4><?php echo $acc ?></h4></td>
                              </tr>
                              <tr>
                                 <td><strong>Leave Remaining :</strong></td>
                                 <td><h4><?php echo $leave ?></h4></td>
                              </tr>
                           </table>
                        </div>
                        <div class="control-group">
                                        
                                        <a href="employeeStatus.php" class="btn btn-primary" style="margin-top:39px;"> Back</a>
                               </div>


</form>

</body>
</html>