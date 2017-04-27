<?php
session_start();
include ('pdo-connection.php');
include ('database-config.php');

$dbuser= $database_user;
$dbpass = $database_pass;
$dbname = $database_name;

$dbcon = $connection_object->connection('localhost',$dbname,$dbuser,$dbpass);
?>
<!-- =============== -->
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="home.css">
 <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>  
<!-- head part cl -->
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">
	<!-- navigation bar start -->

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#myPage">EMS</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#myPage">HOME</a></li>
        <li><a href="#band">About</a></li>
        <li><a href="#contact">Contact</a></li>
  
    <li data-toggle="modal" data-target="#myModal"><a href="#login"><span class="glyphicon glyphicon-log-in" ></span>LOGIN</a></li>
     
      </ul>
    </div>
  </div>
</nav>
<!-- =====Modal=== -->
 <!-- Modal -->

  <div  class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
       
    <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times"></i></button>
          <h4><span class="glyphicon glyphicon-lock"></span> LOG IN</h4>
        </div>
        <div class="modal-body">
            <form role="form" action="" method="post">
                    <div class="form-group">
                              <label for="usrname"><span class="glyphicon glyphicon-user"></span> UserName </label>
                              <input type="text" name="loginEmail" class="form-control" id="usrname" placeholder="Enter email">
                            </div>
                       <div class="form-group">
                              <label for="pwd"><span ><i class="fa fa-key"></i></span>&nbspPassword</label>
                              <input type="password" name="loginPassword" class="form-control" id="pwd" placeholder="Password">
                    </div>
                      <button type="submit" name="login" class="btn btn-block">LOG IN
                              <span class="glyphicon glyphicon-ok"></span>
                      </button>
           </form>
        </div>
        <div class="modal-footer">
          <button type="submit"  class="btn btn-danger btn-default pull-left" data-dismiss="modal">
            <span class="glyphicon glyphicon-remove"></span> Cancel
          </button>
          <p>Need <a href="#">help?</a></p>
        </div>
      </div>
      </div>
    </div>
  

<!-- +++PHP++++ -->

    <?php

    if(isset($_POST['login']))
    {
        $loginmail= $_POST['loginEmail'];
        $loginpass= md5($_POST['loginPassword']);

        $sql = " SELECT * FROM login_info WHERE Email='$loginmail' AND Password= '$loginpass' ";
        $data= $dbcon->query($sql);
        $row=$data->fetch (PDO::FETCH_ASSOC);

        $user_Mail= $row['Email'];
        $user_Pass= $row['Password'];
        $user_Role= $row['Role'];
        $e_ID= $row['Employee_id'];

        if($user_Mail !="" && $user_Pass !="")
        {
            $_SESSION['login']="True";
            $_SESSION['user']= $user_Mail;
            $_SESSION['e_id']= $e_ID;
            $_SESSION['user_Role']= $user_Role;

            if($user_Role == "Admin")
            {
                echo("<script>location.href='admin.php'</script>");
            }
            else
            {
                echo("<script>location.href='employee.php'</script>");
            }
        }
        else
        {
            $error="Wrong Username or Password";
            // echo "string"+("<script>alert(\"$error\")</script>");
            echo "<script>alert(\"$error\")</script>";
            echo("<script>location.href='home.php'</script>");
        }
    }

    ?>



<!--  -->
  <!-- navigation bar Close  -->
  <!-- =======CAROUSEL======== -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
<li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
<!--  -->
    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img class="imgL" src="img/employee.jpg" alt="Image">
        <div class="carousel-caption car">
          <h3 style="color:#b29600">"We are Specialized In Balabala"</h3>
          <button type="submit" class="button"><span>KnowMore</span></button>
        </div>      
      </div>

      <div class="item">
        <img class="imgL" src="img/pc.jpg" alt="Image">
        <div class="carousel-caption car black carL">
          <h3 style="color:#b29600" >Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s. </h3>
         
        </div>      
      </div>

      <div class="item">
        <img class="imgL" src="img/em_engage.jpeg" alt="Image">
        <div class="carousel-caption carL">
          <div class="black">
          <h2 style="color:#b29600;font-weight:bold">We Care Our Employee</h2>
          <p style="color:black">Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
          </p>
          </div>
         
        </div>      
      </div>
    </div>
</div>
<!--  -->
<!-- Container (The About Section) -->
<div id="band" class="container text-center">
  <div class="about"><h3 style="color:#b29600"><b>THE EMS</b></h3>
  <p style="color:#b29600"><em><b>We Believe In Efficiancy!</b></em></p>
  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
  </div>
  <div class="hr">
 <hr >
  </div>
 
  <br>
  <div id="# " class="row humpty">
    <div class="col-sm-4">
      <p class="text-center"><strong> Humty Dumpty</strong></p><br>
      <a href="#demo" data-toggle="collapse">
        <img src="img/humpty.png" class="img-circle person person1" alt="Random Name" width="255" height="255">
      </a>
      <div id="demo" class="collapse">
        <p><b>Vice President</b></p>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
        <p>Since 1988</p>
      </div>
    </div>
   <div class="col-sm-4">
      <p class="text-center"><strong> Humty Dumpty</strong></p><br>
      <a href="#demo2" data-toggle="collapse">
        <img src="img/humpty.png" class="img-circle person person2" alt="Random Name" width="255" height="255">
      </a>
      <div id="demo2" class="collapse">
        <p><b>Vice President</b></p>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
        <p>Since 1988</p>
      </div>
    </div>
     <div class="col-sm-4">
      <p class="text-center"><strong> Humty Dumpty</strong></p><br>
      <a href="#demo3" data-toggle="collapse">
        <img src="img/humpty.png" class="img-circle person person3" alt="Random Name" width="255" height="255">
      </a>
      <div id="demo3" class="collapse">
        <p><b>Vice President</b>t</p>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
        <p>Since 1988</p>
      </div>
    </div>
  </div>
  <div class="row humpty">
    <div class="col-sm-4">
      <p class="text-center"><strong> Humty Dumpty</strong></p><br>
      <a href="#demo4" data-toggle="collapse">
        <img src="img/humpty.png" class="img-circle person person4" alt="Random Name" width="255" height="255">
      </a>
      <div id="demo4" class="collapse">
        <p><b>Vice President</b></p>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
        <p>Since 1988</p>
      </div>
    </div>
      <div class="col-sm-4">
      <p class="text-center"><strong>Humty Dumpty</strong></p><br>
      <a href="#demo5" data-toggle="collapse">
        <img src="img/humpty.png" class="img-circle person person5" alt="Random Name" width="255" height="255">
      </a>
      <div id="demo5" class="collapse">
        <p><b>Vice President</b></p>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
        <p>Since 1988</p>
      </div>
    </div>
      <div class="col-sm-4">
      <p class="text-center"><strong>Humty Dumpty</strong></p><br>
      <a href="#demo6" data-toggle="collapse">
        <img src="img/humpty.png" class="img-circle person person6" alt="Random Name" width="255" height="255">
      </a>
      <div id="demo6" class="collapse">
        <p><b>Vice President</b></p>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
        <p>Since 1988</p>
      </div>
    </div>
  </div>
  <div class="hr">
 <hr >
  </div>
  <br>
</div>
<!-- END of ABout section  -->
<!--  -->
<!--======== =Contacts==  ===== -->
<!-- Container (Contact Section) -->
<div id="contact" class="container">
  <h3 class="text-center ">Contact</h3>
  <br>
  <br>

  <div class="row">
    <div class="col-md-4 ">
      <p><span class="glyphicon glyphicon-map-marker"></span>&nbspDhaka, Bangladesh</p>
      <p><span class="glyphicon glyphicon-phone"></span>&nbspPhone: +88 1515151515</p>
      <p><span class="glyphicon glyphicon-envelope"></span>&nbsp Email : mail@mail.com</p>    
    </div>
    <div class="col-md-8">
      <div class="row ">
        <div class="col-sm-6 form-group  ">
          <input class="form-control " id="name" name="name" placeholder="Name" type="text" required>
        </div>
        <div class="col-sm-6 form-group">
          <input class="form-control " id="email" name="email" placeholder="Email" type="email" required>
        </div>
      </div>
      <textarea class="form-control " id="comments" name="comments" placeholder="Comment" rows="5"></textarea>
      <br>
      <div class="row">
        <div class="col-md-12 form-group">
          <button class="btn pull-right" type="submit">Send</button>
        </div>
      </div>  
    </div>
  </div>
   </div>
   <br>
<br>
<!-- ===== Google Maps===== -->
<!-- Add Google Maps -->
<div id="googleMap"></div>

<script src="http://maps.googleapis.com/maps/api/js"></script>
<script>
var myCenter = new google.maps.LatLng(  23.777176,  90.399452);

function initialize() {
var mapProp = {
center:myCenter,
zoom:12,
scrollwheel:false,
draggable:false,
mapTypeId:google.maps.MapTypeId.ROADMAP
};

var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);

var marker = new google.maps.Marker({
position:myCenter,
});

marker.setMap(map);
}

google.maps.event.addDomListener(window, 'load', initialize);
</script>
<footer class="text-center">
  <a class="up-arrow" href="#myPage" data-toggle="tooltip" title="TO TOP">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a><br><br>
  <p>Bootstrap Theme Made By <a href="http://www.CodersTrust.com" data-toggle="tooltip" title="Visit EMS">PK_BHUIYAN</a></p> 
</footer>
<script>
// javascipt for tool top and tool tip
$(document).ready(function(){
  // Initialize Tooltip
  $('[data-toggle="tooltip"]').tooltip(); 
  
  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {

   // scroll top 
    $('html, body').animate({ scrollTop: 0 }, 'slow');
  
  });
})
</script>
</body>


</html>