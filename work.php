<?php
ob_start();
session_start();
require_once 'dbcon.php';

// select logged in users detail
if (isset($_SESSION['id'])) {
  $_SESSION["type"];
  $res = $conn->query("SELECT * FROM db_user WHERE ID=" . $_SESSION['id']);
  $userRow = mysqli_fetch_array($res, MYSQLI_ASSOC);
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>อู่ซ่อมรถ</title>
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/loader.js"></script>
  <link href="css/style.css" rel="stylesheet" type="text/css">
  <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="css/mdb.min.css" rel="stylesheet">
  <style>

  </style>

</head>

<body id="body">
  <header>

    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark black scrolling-navbar" style="color:white;">
      <div class="container">

        <!-- Brand -->
        <a class="navbar-brand waves-effect" href="https://mdbootstrap.com/docs/jquery/" target="_blank">
          <img src="img/logoW.png" style="width:90px">
        </a>

        <!-- Collapse -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" style="color:white">
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Links -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

          <!-- Left -->
          <ul class="navbar-nav mr-auto" style="text-align:center">
            <?php if (isset($_SESSION['id'])) {
              ?>
              <li class="nav-item" id="profile" style="background-color:black">
                <hr>
                <i class="fa fa-user-circle fa-2x"></i><br>
                <p><?php echo $userRow['name']; ?></p>
                <a href="edit_pro.php" style="color:white">แก้ไขโปรไฟล์</a>
                <hr>
              </li>
            <?php
          }
          ?>
            <li class="nav-item active" style="border-color:white">
              <a class="nav-link waves-effect" href="#">หน้าแรก
                <span class="sr-only">(current)</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link waves-effect" value="mainPage" name="link" href="<?php 
               if($_SESSION["type"]=="0"){ //ถ้าเป็น user ให้กระโดดไปหน้า 

                   Header("Location: mainpage.php");

                    }

                    if ($_SESSION["type"]=="1"){  //ถ้าเป็น admin ให้กระโดดไปหน้า 

                        Header("Location: ad_main.php"); }?>" 

              target="_blank">การจัดการ</a>
            </li>
            <li class="nav-item">
              <a class="nav-link waves-effect" href="" target="_blank">วิธีการชำระเงิน</a>
            </li>
          </ul>

          <!-- Right -->
          <ul class="navbar-nav nav-flex-icons" id="usernor" style="text-align:center">
            <li class="nav-item">
              <i class="fa fa-bell"><span class="badge badge-danger ml-2">4</span></i>
              <?php
              if (isset($_SESSION['id'])) {
                echo $userRow['name'] . ' |';
                echo '<a href="logout.php?logout">  ลงชื่อออก</a>';
              } else {
                echo '<a href="login.php" >ลงชื่อเข้าระบบ </a>';
                echo '|';
                echo '<a href="register.php" > สมัครสมาชิก</a>';
              }
              ?>



            </li>
          </ul>

          <ul class="navbar-nav nav-flex-icons" id="userres" style="text-align:center">
            <li class="nav-item">
              <?php
              if (isset($_SESSION['id'])) {
                echo '<a href="logout.php?logout" >ลงชื่อออก</a>';
              } else {
                echo '<a href="login.php"  style="color:white" value="pageIndex" name="link">ลงชื่อเข้าระบบ</a></li>';
                echo '<li><a href="register.php" style="color:white">สมัครสมาชิก</a>';
              }
              ?>



            </li>
          </ul>

        </div>

      </div>
    </nav>
    <!-- Navbar -->

  </header>


  <div id="carouselFull" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselIndicators" data-slide-to="1"></li>
      <li data-target="#carouselIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block" id="threeslide" src="img/TE1.png" alt="First slide" style="width: 100%;height: 600px;">
        <div class="carousel-caption d-md-block">
          <h3></h3>
          
        </div>
      </div>
      <div class="carousel-item">
        <img class="d-block" id="threeslide" src="img/TE2.png" alt="Second slide" style="width: 100%;height: 600px;">
        <div class="carousel-caption d-md-block">
          <h3></h3>
          
        </div>
      </div>
      <div class="carousel-item">
        <img class="d-block" id="threeslide" src="img/TE3.png" alt="Third slide" style="width: 100%;height: 600px;">
        <div class="carousel-caption d-md-block">
          <h3></h3>
         
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselFull" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselFull" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  <section id="about" style="margin-top:30px">
    <div class="container">
      <h1 style="text-align:center">บริการของเรา</h1>
      <hr>
      <div class="row justify-content-center" align="center">
        <div class="col ">
          <img src="img/sq1.jpg" id="threepic" class="rounded-circle" alt="Cinque Terre" style="width:200px">
        </div>
        <div class="col ">
          <img src="img/sq1.jpg" id="threepic" class="rounded-circle" alt="Cinque Terre" style="width:200px">
        </div>
        <div class="col ">
          <img src="img/sq1.jpg" id="threepic" class="rounded-circle" alt="Cinque Terre" style="width:200px">
        </div>
      </div>
      <br>
      <div class="row justify-content-center" align="center">
        <div class="col">
          <h4>ซ่อม</h4>
        </div>
        <div class="col">
          <h4>After Service</h4>
        </div>
        <div class="col">
          <h4>Professional</h4>
        </div>
      </div>
    </div>
  </section>

  <footer class="page-footer font-small teal pt-4 special-color-dark" id="ftnor">

    <!-- Footer Text -->
    <div class="container-fluid text-center text-md-left">

      <!-- Grid row -->
      <div class="row">

        <!-- Grid column -->
        <div class="col-md-6 mt-md-0 mt-3">

          <!-- Content -->
          <h5 class="text-uppercase font-weight-bold">ที่อยู่:</h5>
          <p>126/1 Vibhavadi Rangsit Rd, แขวง รัชดาภิเษก Khet Din Daeng, Krung Thep Maha Nakhon 10400</p>

        </div>
        <!-- Grid column -->

        <hr class="clearfix w-100 d-md-none pb-3">

        <!-- Grid column -->
        <div class="col-md-6 mb-md-0 mb-3">

          <!-- Content -->
          <h5 class="text-uppercase font-weight-bold">ติดต่อเรา:</h5>
          <ul class="list-unstyled list-inline ">
            <li class="list-inline-item">
              <a class="btn-floating btn-fb mx-1">
                <i class="fa fa-facebook-f"> </i>
              </a>
            </li>
            <li class="list-inline-item">
              <a class="btn-floating btn-tw mx-1">
                <i class="fa fa-twitter"> </i>
              </a>
            </li>
            <li class="list-inline-item">
              <a class="btn-floating btn-gplus mx-1">
                <i class="fa fa-google-plus"> </i>
              </a>
            </li>
          </ul>
          <h5>โทร: </h4>
            <p>(+66)98545222</p>

        </div>
        <!-- Grid column -->

      </div>
      <!-- Grid row -->

    </div>
    <!-- Footer Text -->

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© 2019 Copyright:
      <a href="https://mdbootstrap.com/education/bootstrap/"> Oat Nutratanon</a>
    </div>
    <!-- Copyright -->

  </footer>
  <!-- Footer -->

  <footer id="ft">
    <div class="fixed-bottom row" style="background-color:black;">
      <div class="col" style="text-align:center;border-right: 2px solid white;">
        <div class="row justify-content-center">
          <i class="fa fa-home fa-lg" style="color:white;margin-top:10px"></i>
        </div>
        <div class="row justify-content-center" id="home">
          <p style="color:white;"> หน้าแรก</p>
        </div>
      </div>
      <div class="col " style="text-align:center;border-right: 2px solid white;" id="queue">
        <div class="row justify-content-center">
          <i class="fa fa-calendar fa-lg" style="color:white;margin-top:10px"></i>
        </div>
        <div class="row justify-content-center">
          <p style="color:white;"> จัดการจองคิว</p>
        </div>
      </div>
      <div class="col" style="text-align:center;border-right: 2px solid white;" id="chat">
        <div class="row justify-content-center ">
          <i class="fa fa-comments fa-lg" style="color:white;margin-top:10px"></i>
        </div>
        <div class="row justify-content-center">
          <p style="color:white;"> พูดคุยกับช่าง</p>
        </div>
      </div>
    </div>
  </footer>
  <script>
    $(document).ready(function() {
    $('#queue').click(function(e) {  
      window.open("mainpage.php");
    });
    $('#home').click(function(e) {  
      window.open("work.php");
    });
    $('#chat').click(function(e) {  
      window.open();
    });
});
  </script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>

</html>