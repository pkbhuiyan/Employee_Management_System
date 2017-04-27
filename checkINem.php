
<?php 
session_start();
if ($_SESSION['login']!="True") {
  # code...
 
  $error="Sorry You Have To Login First.";
  echo("<script>alert(\"$error\")</script>");
  echo("<script>location.href='home.php'</script>");
}
else{
  if ($_SESSION['user_Role'] =='Admin') {
    # code...
    echo "U can't view this page!!!!";
  }
  $e_id=$_SESSION['e_id'];
 include ('pdo-connection.php');
    include ('database-config.php');

    $dbuser= $database_user;
    $dbpass = $database_pass;
    $dbname = $database_name;

    $dbcon = $connection_object->connection('localhost',$dbname,$dbuser,$dbpass);
    
}

?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="ceckINem.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
 <!--====font awessome======  -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<!-- jQuery library -->
<!-- Latest compiled JavaScript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container" style="padding:84px;">
 <h2 class="text-center"><span style="color:#2ecc71">CheckIN</span><span style="color:gray;">\</span><span style="color:#e67e22;">CeckOut</span></h2>
  <hr>
  <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <form role="form" method="post" action="">
                <select name="time" class="form-control" style="width: 58%;position: relative;margin: 8px -99px;top: 5%;left: 36%;">
                  <option >Select</option>
                  <option value="TimeIn">Time In</option>
                  <option value="TimeOut">Time Out</option>
                </select><br>
                <textarea name="reason" style="height: 66px;position: relative;margin: 4px -37px;width: 287px;top: ;left: 33%;" class="form-control" rows="2" placeholder="Reason"></textarea>
                 <div style="height:20px; position:relative; margin: 16px -50px; width:100px; top:50%; left:50%;">
                  
                  <button name="save" type="submit"class="btn btn-primary  " style="padding:9px 25px;">Submit</button>
        </div></div>
            <div class="col-md-2"></div>

        </div>
          <div class="control-group">
                                        
                                        <a href="employee.php" class="btn btn-primary" style="margin-top:39px;"> Back</a>
                               </div>
    </form>
</div>


   <?php
      date_default_timezone_set('Asia/Dhaka');
      
      if(isset($_POST['save'])) {
          $timeupdate = $_POST['time'];
          $message = $_POST['reason'];
          $date = date('Y-m-d');
          $check = "SELECT count(*) AS count FROM working_details WHERE id='$e_id' and date='$date'";
          $store = $dbcon->query($check);
          $cnt = $store->fetch(PDO::FETCH_ASSOC);
          $tcnt = $cnt['count'];
          if($timeupdate == 'TimeIn' && $tcnt == 0) {
              
              $time = date('H:i:sa');
              $insert = "INSERT INTO working_details(id, date, in_time, out_time, reason) 
              VALUES('$e_id','$date','$time','00:00:00','$message')";
              $dbcon->query($insert);
              $str = 'your time has been set';
              echo "<script>alert(\"$str\")</script>";
            
                echo "<script>location.href='employee.php'</script>"; 
              }
         
          elseif($timeupdate=='TimeOut' && $tcnt == 1){
              
              $time = date('H:i:as');
              $update = "UPDATE working_details SET out_time = '$time' WHERE id = '$e_id' and date='$date'";
              $dbcon->query($update);
              $str = 'your information hass been update';
              echo "<script>alert(\"$str\")</script>";
             
                echo "<script>location.href='employee.php'</script>"; 
              }
              
         
          else{
              $in='Sorry! You have already submitted your time.\n';
              echo "<script>alert(\"$in\")</script>";
                echo "<script>location.href='employee.php'</script>"; 
              }
          
      }
      
   

  ?> 
</body>
</html>
