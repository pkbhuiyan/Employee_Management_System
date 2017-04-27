<?php 
include('adminEX.php');

 ?>
 <link rel="stylesheet" type="text/css" href="addEmployee.css">


<!-- =====There must be shiting form === -->
<form role="form" action="" method="post" enctype="multipart/form-data">
<div class="row form">
  <!-- 1st div -->
  
  <div class="col-md-5 fiv1">
    <legend style="padding-bottom:10px;">Personal Information</legend>
 
  <div class="form-group">
    <!-- name -->
  <input id="textinput" name="name" type="text" placeholder="Name" class="form-control input-md frm">
</div>
<div class="form-group">
  <input id="textinput" name="f_name" type="text" placeholder="Father Name" class="form-control input-md frm">
</div>
<div class="form-group">
  <input id="textinput" name="m_name" type="text" placeholder="Mother Name" class="form-control input-md frm">
</div>
<div class="form-group">
  <input id="textinput" name="address" type="text" placeholder="Address" class="form-control input-md frm">
</div>
<div class="form-group">
  <input id="textinput" name="Nid" type="text" placeholder="National ID" class="form-control input-md frm">
</div>
<div class="form-group">
  <input id="textinput" name="phone" type="text" placeholder="Phone" class="form-control input-md frm">
</div>
<div class="form-group">
  <input id="textinput" name="dob" type="text" placeholder="Date Of Birth:yyyy-mm-dd" class="form-control input-md frm">
</div>

  <div class="form-group">
    <!-- email -->
        <input type="email" name="email" class="form-control frm" id="email" placeholder="Enter email">
    </div>
    <div class="form-group">
    <!--   <label for="pwd">Password:</label> -->
      <input type="password" name="password" class="form-control frm" id="pwd" placeholder="Enter password">
    </div>   
    <!-- Select Basic Gender -->
<div class="form-group">
      <select id="selectbasic" name="gender"class="form-control frm">
       <option selected="selected" >Select Option</option>
      <option >Male</option>
      <option >Female</option>
      <option >Others</option>
    </select>
</div>
<!-- Select Basic Blood-->

<div class="form-group">
    <select id="selectbasic" name="blood" class="form-control frm">
      <option selected="selected" >Select Option</option>
      <option >A+</option>
      <option >A-</option>
      <option >B+</option>
      <option >B-</option>
      <option >O+</option>
      <option >O-</option>
      <option >AB+</option>
      <option >AB-</option>
    </select>
</div>
  </div>
  <!-- ======2nd div====== -->
  <div class="col-md-1"></div>
  <!-- 3rd  div-->
  <div class="col-md-5 fiv2">
<!-- <form class="form-horizontal"> -->
<fieldset>
<!-- Form Name -->
<legend>Proffesional Information</legend>
<div class="form-group">
  <input id="textinput" name="id" type="text" placeholder="Employee id" class="form-control input-md frm">
</div>
<div class="form-group">
  <input id="textinput" name="department" type="text" placeholder="Department" class="form-control input-md frm">
</div>
<div class="form-group">
    <select id="selectbasic" name="userRole" class="form-control frm">
      <option value="Admin">Admin</option>
      <option value="Employee">Employee</option>
    </select>
</div>

<div class="form-group">
  <input id="textinput" name="designation" type="text" placeholder="Designation" class="form-control input-md frm">
</div>
<div class="form-group">
  <input id="textinput" name="salary" type="text" placeholder="Salary" class="form-control input-md frm">
</div>
<div class="form-group">
  <input id="textinput" name="j_date" type="text" placeholder="Joining Date:yyyy-mm-dd" class="form-control input-md frm">
</div>
<div class="form-group">
    <select id="selectbasic" name="status" class="form-control frm">
      <option >Active</option>
      <option >Deactive</option>
    </select>
</div>
<div class="form-group file">
                                <label for="exampleInputFile">Image</label>
                                <input type="file" id="exampleInputFile" name="img">
                                </div>
                                <div class="form-group file">
                                <label for="exampleInputFile">CV</label>
                                <input type="file" id="exampleInputFile" name="cv">
                                </div>
</fieldset>


</div>
  <div class="row">
        <div class="col-md-12 form-group center">
          <button class="btn  " name="add_btn" type="submit">SUBMIT</button>
        </div>
      </div>
  </div>
</form>
     
<!-- 
</div> -->
<!-- ====PHP for inserting ====== -->
  <?php

            if(isset($_POST['add_btn']))
                                {
                                    $id = $_POST['id'];
                                    $Name = $_POST['name'];
                                    $FathersName = $_POST['f_name'];
                                    $MotherName = $_POST['m_name'];
                                    $Email = $_POST['email'];
                                    $Pass = md5($_POST['password']);
                                    $Gender = $_POST['gender'];
                                    $Address = $_POST['address'];
                                    $NID = $_POST['Nid'];
                                    $Contact = $_POST['phone'];
                                    $DOB = $_POST['dob'];
                                    $JDate = $_POST['j_date'];
                                    $Blood = $_POST['blood'];
                                    $UserRole = $_POST['userRole'];
                                    $Department = $_POST['department'];
                                    $Designation = $_POST['designation'];
                                    $Status = $_POST['status'];
                                    $Salary = $_POST['salary'];
                                    // $Image = $_POST['img'];
                                    $CV = $_POST['cv'];
                                 
                                    move_uploaded_file($_FILES['img']['tmp_name'],"images / ".$_FILES['img']['name']);

                                    $sql1 = "INSERT INTO login_info(Email,Password,Role,Employee_id) VALUES ('$Email','$Pass',   '$UserRole','$id')";
                                    $sql2 = "INSERT INTO employee_personal_info(id,Name,Date_of_Birth,  Adress,Gender,  Phone,  NID,Image,Blood_group) VALUES ('$id', '$Name', '$DOB', '$Address', '$Gender', '$Contact', '$NID',' ".$_FILES['img']['name']." ','$Blood')";
                                    $sql3 = "INSERT INTO employee_professional_info(  id,Designation,Department,Joining_date,Salary,Status) VALUES ('$id', '$Designation','$Department', '$JDate',  '$Salary', '$Status')";



if($dbcon->query($sql1) && $dbcon->query($sql2) && $dbcon->query($sql3))
                                    {
                                        echo("<script>location.href='home.php'</script>");
                                    }
                                    else
                                    {
                                        $string = ' Sorry! Try Again.\n';
                                        echo"<script>alert(\"$string\")</script>";
                                        echo("<script>location.href='addEmployee.php'</script>");
                                    }

}
            ?>
            <!-- ===== PHP======= -->

</body>


</html>