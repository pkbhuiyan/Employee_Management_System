<?php  
    include ('pdo-connection.php');
    include ('database-config.php');

    $dbuser= $database_user;
    $dbpass = $database_pass;
    $dbname = $database_name;

    $dbcon = $connection_object->connection('localhost',$dbname,$dbuser,$dbpass);
    $select="SELECT*FROM working_details ";


     $data = $dbcon->query($select);

    
?> 

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <link rel="icon" type="image/png" href="assets/img/favicon.ico">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  
  <title>Fresh Bootstrap Table by Creative Tim</title>
<link rel="stylesheet" type="text/css" href="employeeStatus.css">
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
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
  <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <link rel="stylesheet" type="text/css" href="workingHR.js"> 
  <script type="text/javascript" src="workingHR.js"></script>
  <style type="text/css">

   .datepicker{
        padding: 30px;
        position: relative;
        left: 28%;
   }
   .search{
        position: relative;
        left: 8%;
        bottom: 7%;
   }

  </style>     


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
<form action="" method="post" >
  <div class="class-1">
    <input type="" name="e_id" class="search_bar " placeholder="EmployeeId Or Name">
    <input type="submit" name="search_btn" class="bar btn-primary" value="Go">
  </div>
 
   

    <!--  -->
    <div class="datepicker" style="float:left;right:40%;">
    <label for="from">From</label>
    <input type="text" id="from" name="from">
    <label for="to">to</label>
    <input type="text" id="to" name="to">
    </div>
</form>

<?php 
 // date_default_timezone_set('Asia/Dhaka');

 if (isset($_POST['search_btn'])) {
    
   $e_id=$_POST['e_id'];
   $l_date=$_POST['from'];
   $r_date=$_POST['to'];
   if ($e_id =='' || $l_date =='' || $r_date =='') {
     $alert="YOu have to fill all of the field !! ";
     echo ("<script>alert(\"$alert\")</script>");
   }
   else{
    $search="SELECT*FROM working_details WHERE id='$e_id' 
   AND (date BETWEEN '$l_date' AND '$r_date')";
   $data=$dbcon->query($search);
  

   }
   
    

    }
    


?>

     <div class="container">
         <table class="table table-hover css-serial" >
            <thead class="thead-inverse" border="1" style="position:relative;left:6%;text-align:center;">
              <tr>
              <th>Serial</th>
              <th >Date</th>
              <th >Hour</th>
              <th >Over Time</th>
              <th >Less Time</th>
              <th >Reason</th>
              </tr>
          </thead>
      <tbody  border="1"> 
            <?php 
               
             while ( $row = $data->fetch(PDO::FETCH_ASSOC) ) {

             	 $start_time=strtotime($row['in_time']) ;//convert to time String
             	 $out_time=strtotime($row['out_time']) ;// ^^
               $diff=$out_time-$start_time;
               $hours=$diff/3600; // seconds to hours 
               $total=intval(number_format($hours, 2));

              if($total<8){
                $less=8-$total;
                $Over=0;
              }elseif ($total>8) {
                $Over=$total-8;
                $less=0;
              }else{
                $Over=0;
                $less=0;
              }
             	 

            ?>

            <tr>
                <td style="text-align:center; word-break:break-all; width:300px;"> </td>
                <td style="text-align:center; word-break:break-all; width:300px;">
                  <?php echo date('F d,Y ',strtotime($row['date'])) ; ?>
                </td>
                <td style="text-align:center; word-break:break-all; width:200px;"> <?php echo $total ; ?></td>
                <td style="text-align:center; word-break:break-all; width:200px;"> <?php echo $Over ; ?></td>
                <td style="text-align:center; word-break:break-all; width:200px;"> <?php echo $less ; ?></td>
                <td style="text-align:center; word-break:break-all; width:450px;"> <?php echo $row ['reason']; ?></td>              
              </tr>
              <?php } ?>  
      </tbody>
          </table>
    </div>
</div>
</body>


</html>