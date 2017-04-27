<?php 
include('adminEX.php');

 ?>
  <link rel="stylesheet" type="text/css" href="myProfile.css">

<!--  -->

<div class="container main">
 <form role="form" action="" method="post" enctype="multipart/form-data"> 
<div class="row padin">
    <!-- == Image == -->
    
<div class="col-md-4 ">
<div class="col-md-12 center">

<?php /*    echo "<img  class='img-responsive center'  alt="Employee Image " style='border-radius:100%;height: 300px; width:300px ; ' src='images/ ".$image." ' />" 
*/?>





<img class='img-responsive center' alt='Employee Image' style='border-radius:100%;' src="images/<?php echo $image ?>">
<!-- 
workl ! work !!!
 -->

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
    // $image=$_POST['img'];

    move_uploaded_file($_FILES['img']['tmp_name'],"images /".$_FILES['img']['name']);
    $update = "UPDATE employee_personal_info SET Name='$name',Adress='$address',Phone='$contact',Image='".$_FILES['img']['name']."'  WHERE id ='$e_id'";
   
    if($dbcon->query($update)){
    $str = 'your information hass been update';
    echo "<script>alert(\"$str\")</script>";
    echo "<script>location.href='myProfile.php'</script>"; 
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

