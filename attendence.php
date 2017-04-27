 <?php  
    include ('pdo-connection.php');
    include ('database-config.php');

    $dbuser= $database_user;
    $dbpass = $database_pass;
    $dbname = $database_name;

    $dbcon = $connection_object->connection('localhost',$dbname,$dbuser,$dbpass);
    $select="SELECT employee_professional_info.id, employee_professional_info.Department, employee_professional_info.Designation, employee_professional_info.Salary, employee_professional_info.leave_remaining,employee_personal_info.Name
      FROM employee_professional_info INNER JOIN employee_personal_info 
      ON employee_personal_info.id=employee_professional_info.id";


     $data = $dbcon->query($select);

    
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <link rel="icon" type="image/png" href="assets/img/favicon.ico">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  
  <title>Fresh Bootstrap Table by Creative Tim</title>
<link rel="stylesheet" type="text/css" href="attendence.css">
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
 <link rel="stylesheet" type="text/css" href="myProfile.css">
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
<div class="wrapper">
<form action="" method="post" class="class-1">
    <input type="" name="input" class="search_bar " placeholder="EmployeeId Or Name">
    <input type="submit" name="search_btn" class="bar btn-primary" value="Go">
</form>

<?php 
  
 if (isset($_POST['search_btn'])) {
      # code...
   $search=$_POST['input'];  
    if ($search == '') {
      # code...
      $select1="SELECT employee_professional_info.id, employee_professional_info.Department, employee_professional_info.Designation, employee_professional_info.Status,employee_personal_info.Name
        FROM employee_professional_info INNER JOIN employee_personal_info 
        ON employee_personal_info.id=employee_professional_info.id";
        $data = $dbcon->query($select1);
    }else{
      # code...
      $select1="SELECT employee_professional_info.id, employee_professional_info.Department, employee_professional_info.Designation, employee_professional_info.Status,employee_personal_info.Name
        FROM employee_professional_info INNER JOIN employee_personal_info 
        ON employee_personal_info.id=employee_professional_info.id WHERE employee_professional_info.id='$search' OR Name='$search' ";
        $data = $dbcon->query($select1);
    }

    }
    


?>

     <div class="container  tbl">
         <table class="table table-hover css-serial">
            <thead class="thead-inverse">
              <tr>
              <th >Serial</th>
              
              <th >Name</th>
              <th >Department</th>
              <th >Designation</th>
              <th >Status</th>
              
              <th >Actions</th>
              </tr>
          </thead>
      <tbody>
            <?php 
               
             while ( $row = $data->fetch(PDO::FETCH_ASSOC) ) {
              $id=$row['id'];   

            
            ?>

            <tr>
                <td style="text-align:center; word-break:break-all; width:300px;"> </td>
                
                <td style="text-align:center; word-break:break-all; width:200px;"> <?php echo $row ['Name']; ?></td>
                <td style="text-align:center; word-break:break-all; width:200px;"> <?php echo $row ['Department']; ?></td>
                <td style="text-align:center; word-break:break-all; width:200px;"> <?php echo $row ['Designation']; ?></td>
                <td style="text-align:center; word-break:break-all; width:450px;"> <?php echo $row ['Status']; ?></td>
                
                <td style="text-align:center; width:350px;">
                  <a href="edit.php<?php echo '?id='.$id; ?>" class="fa fa-eye"></a><span style="color: red;">/</span>
                   <a href="view.php<?php echo '?id='.$id; ?>"    class="fa fa-pencil" > </a>
                </td>
                  
                    <!-- Modal -->

                </div>
              </tr>
              <?php } ?>  
                      </tbody>
          </table>
    </div>
</div>
</body>


</html>