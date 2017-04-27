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
<body>
	<div class="container">
<div class="hero-unit-header">
 <div class="container-con">
<!-- end banner & menunav -->

<div class="container">
<div class="row-fluid">
<div class="span12">
<div class="row-fluid">
<div class="span3"></div>
<div class="span6">


<div class="hero-unit-3">
<center>

<?php


?>
<form class="form-horizontal" method="post" action=""  enctype="multipart/form-data" >
                                <legend><h4>Edit</h4></legend>
                                <h4>Personal Information</h4>
                                <hr>
								<div class="control-group">
                                    <label class="control-label" >Name:</label>
                                        <input type="text" name="name"  value="<?php echo $name; ?>">
                                </div>
								<div class="control-group">
                                    <label class="control-label" >ID:</label>
                                        <input name="id1"  type="text" value="<?php echo $id;?>">
                                </div>
                                <div class="control-group">
                                    <label class="control-label" >Department:</label>
                                        <input  name="depart"  type="text" value="<?php echo $department;?>">
                                </div>
                                <div class="control-group">
                                    <label class="control-label" >Designation:</label>
                                        <input type="text" name="desig"  value="<?php echo $designation;?>">
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Salary:</label>
                                    <input type="text" name="salary"  value="<?php echo $salary;?>">
                                </div>
                                 <div class="control-group">
                                    <label class="control-label" for="inputPassword">Account No:</label>
                                        <input type="text" name="acc"  value="<?php echo $acc;?>"> 
                                </div>
			<div class="control-group">
                                    <label class="control-label" for="inputPassword">Leave Remain:</label>
                                    <input type="text" name="leave"  value="<?php echo $leave;?>">
                                </div>
			<div class="control-group">
                                        <button type="submit" name="update" class="btn btn-success" style="margin-right: 65px;margin-top:39px;">Save</button>
			         <a href="employeeStatus.php" class="btn btn-primary" style="margin-top:39px;"> Back</a>
                               </div>
                            </form>

								</center>
								</center>

		</div>
		</div>
		</div>
		</div>
		</div>
		</div>
		</div>
		</div>
		</div>






<?php   

if (isset($_POST['update'])) {
	# code...
	$get_id=$_REQUEST['id'];
	$name1=$_POST['name'];
	$id1=$_POST['id1'];
	$depart1=$_POST['depart'];
	$desig1=$_POST['desig'];
	$salary1=$_POST['salary'];
	$acc1=$_POST['acc'];
	$leave1=$_POST['leave'];

	$update1 = " UPDATE employee_professional_info SET id='$id1',Department='$depart1',Designation='$desig1',Salary='$salary1' ,Account_no='$acc1', leave_remaining='$leave1'   WHERE id='$get_id' ";
  $data1 = $dbcon->query($update1);
	$update2 = " UPDATE employee_personal_info SET Name='$name1'   WHERE id='$get_id' ";
  $data2 = $dbcon->query($update2);


  
	    if($data1 && $data2){

    echo "<script>location.href='employeeStatus.php'</script>"; 
    }else
    {
        $string = ' Sorry! Try Again.\n';
        echo"<script>alert(\"$string\")</script>";
          }
}


?>

</body>
</html>