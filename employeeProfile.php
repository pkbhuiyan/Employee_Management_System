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
                    <li><a href="employee.php">HOME</a></li>
                    <li><a href="checkINem.php">CheckIN</a></li>
                    <li><a href="employeeProfile.php">MyProfile</a></li>
                     <li><a href="logout.php">LogOut</a></li>
                    </li>
            </ul>
        </div>
    </div>
</div>

<!--  -->

<div class="container main">
 <form role="form" action="" method="post" enctype="multipart/form-data"> 
<div class="row padin">
    <!-- == Image == -->
    
<div class="col-md-4 ">
<div class="col-md-12 center">

<!-- 
<?php echo "<img class='img-responsive center' alt='Employee Image'style='border-radius:100%;height: 300px; width:300px ; '  src='images/ ".$image." '>" ?> 
//  that method doesn't work follow the following method 
-->
<img class='img-responsive center' alt='EmployeeImage' style='border-radius:100%;height: 300px; width:300px ; ' src="images/<?php echo $image ?>">
<!-- work ! work !!  -->


<h3 id="name_label" class="center"><?php echo $name;?></h3>

  <div class="form-group file" id="pro_image_file">
               <label for="exampleInputFile"><?php echo $image;?></label>
                <input type="file" id="exampleInputFile" name="img">
  </div>
</div>
</div>

<!-- == Information == -->

<div class="col-md-7">
  <div class="form-group pull-right"> 
           <button id="edit_btn" type="button" class=" btn-danger"  name="edit"><i class="fa fa-pencil" aria-hidden="true"></i></button>
           <!-- <input name="edit"  type="button" id="edit_btn" class="btn btn-danger" value="Edit"> -->
         </div>
    <div class="form-group" id="name">
          <label>Name</label>
              <input name="name"  class="form-control frm" type="text" value="<?php echo $name;?>" disabled/>  
    </div>
          <div class="form-group">
           <label>Employee ID</label>
              <input name="e_id" id="e_id" class="form-control frm" type="text" value="<?php echo $id;?>" disabled/>
 </div>
              <div class="form-group">             
            <label>Email</label>
              <input name="email" id="email" class="form-control frm" type="text" value="<?php echo $email;?> "  disabled/>
 </div>
              <div class="form-group">
            <label>Date of Birth</label>
              <input name="d_birth" id="email" class="form-control frm" type="text" value="<?php echo $dob;?>" disabled/>
 </div>
              <div class="form-group">
              <label>Gender</label>
              <input name="gender" id="gender" class="form-control frm" type="text" value="<?php echo $gender;?> " disabled/>
 </div>
              <div class="form-group">           
            <label>Contact Number</label>
              <input name="c_num" id="c_num" class="form-control frm" type="text" value="<?php echo $contact;?>" disabled/>
 </div>
              <div class="form-group">
            <label>Nation ID</label>
              <input name="n_id" id="nid" class="form-control frm" type="text" value="<?php echo $nid;?>" disabled/>
 </div>
              <div class="form-group">
              <label>Blood Group</label>
              <input name="b_grp" id="b_grp" class="form-control frm" type="text" value="<?php echo $blood_group;?>" disabled/>
 </div>
              <div class="form-group">             
            <label>Adress</label>
              <input name="addrs" id="addrs" class="form-control frm" type="text" value="<?php echo $address;?>" disabled/>
 </div>
              <div class="form-group">
            <label>Department</label>
              <input name="depart" id="deprt" class="form-control frm" type="text" value="<?php echo $department;?>" disabled/>
 </div>
              <div class="form-group">
              <label>Designation</label>
              <input name="desig" id="desig" class="form-control frm" type="text" value="<?php echo $designation;?>" disabled/>
 </div>
              <div class="form-group">             
            <label>Joining Date</label>
              <input name="j_date" id="j_date" class="form-control frm" type="text" value="<?php echo $jd;?>" disabled/>
            </div>
<br/>
<!-- ===== buttton == -->

           <div class="form-group"  > 
          <!--  <button id="submit_btn" type="submit" class="btn btn-primary" name="save">Save Changes</button> -->
          <!-- eikhane input e id  jquery te ... submit er action k destroy kore  -->
           <input name="update"  type="submit" id="update"  class="btn btn-primary " value="Save Changes" disabled>
          </div>
         <!-- ====  Jquery for form disabled until it hit edit -->


            <script type="text/javascript">
jQuery(function ($) {
   $("#name").hide(0);
   $("#pro_image_file").hide(0);
     $('#edit_btn').click(function () {
       $("#name").show(0);
       $("form input").prop('disabled', false);
       $("#e_id,#desig,#j_date,#deprt,#b_grp,#gender,#nid,#email").prop('disabled', true);
       $("#pro_image_file").show(0);
       $("#name_label").hide(0);
    });
    $('#submit_btn').click(function () {
      $("#name").hide(0);
      $("form input").prop('disabled', true);
       $("#pro_image_file").hide(0);
       $("#name_label").show(0);
    });
})
            </script>
            <!-- =EOS= -->

</div>

</div>
<!--    </form> -->
</form>
<?php

 if(isset($_POST['update'])){
    
    $name=$_POST['name'];
    $address=$_POST['addrs'];
    $contact=$_POST['c_num'];
    $image=$_POST['img'];
     move_uploaded_file($_FILES['img']['tmp_name'],"images/".$_FILES['img']['name']);
    $update = "UPDATE employee_personal_info SET Name='$name',Adress='$address',Phone='$contact',Image='".$_FILES['img']['name']."'  
    WHERE id ='$e_id'";
    if($dbcon->query($update)){
    $str = 'your information hass been update';
    echo "<script>alert(\"$str\")</script>";
    echo "<script>location.href='employeeProfile.php'</script>"; 
    }else
    {
        $string = ' Sorry! Try Again.\n';
        echo"<script>alert(\"$string\")</script>";
          }

  }
 
?>

</div>


</body>



</html>

