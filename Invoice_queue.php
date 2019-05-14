<?php
ob_start();
session_start();
require 'dbcon.php';
$type = $_SESSION['type'];
if (!isset($_SESSION['id']) || $type != 1) {
   header("location:login.php");
   exit(0);
}
$Queue_id_order   = $_GET['Queue_id_order'];
$qpro = "SELECT * FROM queue WHERE Queue_id_order='$Queue_id_order'";
$respro = mysqli_query($conn, $qpro);
$rowpro = mysqli_fetch_array($respro, MYSQLI_ASSOC);
$name = $_SESSION['name'];
?>

<!DOCTYPE html>
<html>

<head>
   <meta charset="utf-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   <title>UTCC JOBs</title>

   <!-- Bootstrap CSS CDN -->
   <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
   <!-- Our Custom CSS -->
   <link rel="stylesheet" href="css/stylepage.css">

   <!-- Font Awesome JS -->
   <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
   <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

</head>

<body>
   <div class="wrapper">
      <!-- Sidebar  -->
      <nav id="sidebar">
         <div class="sidebar-header" style="text-align:center;">
            <a href="work.php"><img src="img/logoW.png" width="150px"></a>
            <h5 style="color:white;margin-top:10px">ชื่อผู้ใช้</h5>
            <p><?php echo $name ?></p>
            <button type="button" class="btn btn-primary">แก้ไขข้อมูลส่วนตัว</button>
         </div>

         <ul class="list-unstyled components">
            <p>เมนู</p>
            <li class="active">
                    <a href="ad_main.php">หน้าแรก</a>
                </li>
                <li>
                    <a href="fn_queue.php">พูดคุย</a>
                </li>       
                <li>
                    <a href="login.php">ออกจากระบบ</a>
                </li>
         </ul>


      </nav>

      <!-- Page Content  -->
      <div id="content">

         <nav class="navbar navbar-expand-lg navbar-dark black scrolling-navbar" style="color:white;">
            <div class="container">



               <!-- Collapse -->
               <button type="button" id="sidebarCollapse" class="btn btn-info">
                  <i class="fa fa-align-left"></i>

               </button>
               <h2 class="justify-content-center">Admin-Dashboard</h2>

               <!-- Links -->

            </div>
         </nav>
         <form action="bn_Invoice_queue.php" method="post" enctype="multipart/form-data" id="form1">
            <h2> สร้างใบชำระเงิน </h2>

            <label class="form-text">แบรนด์รถ</label>
            <input id="	Queue_Brand_car" name="Queue_Brand_car" class="form-control" value="<?php echo   $rowpro['Queue_Brand_car']; ?>" disabled>

            <label class="form-text">ปัญหาของรถ</label>
            <input id="" name="" class="form-control" value="<?php echo   $rowpro['Queue_problem_car']; ?>" disabled>

            <label class="form-text">วันที่ลูกค้าต้องการเข้า</label>
            <input class="form-control" value="<?php echo   $rowpro['Queue_date']; ?>" disabled>

            <label class="form-text">ชื่อช่าง</label>
            <input id="Queue_Mechanic_name" name="Queue_Mechanic_name" class="form-control" value="<?php echo   $rowpro['Queue_Mechanic_name']; ?>" disabled>

            <label class="form-text">ทะเบียนรถ</label>
            <input id="Queue_Number_car" name="Queue_Number_car" class="form-control" value="<?php echo  $rowpro['Queue_plate_car']; ?>" disabled>


            <!--------------------------------------------------------------------------------------------------------------------------------------------------->

            <label class="form-text">ปัญหาของรถที่ช่างเจอ</label>
            <input id="Invoice_found_problem" name="Invoice_found_problem" class="form-control" value="<?php echo   $rowpro['Queue_Brand_car']; ?>">

            <label class="form-text">ค่าใช้จ่ายทั้งหมดในการซ้อม</label>
            <input id="Invoice_cost" name="Invoice_cost" class="form-control">

            <label class="form-text">วันที่ออกใบชำระหนี้</label>
            <input id="Invoice_start" name="Invoice_start" type="date" class="form-control" value="<?php echo strftime('%Y-%m-%d', strtotime($rowpro['Invoice_start']));          ?>">

            <label class="form-text">วันที่ออกใบชำระหนี้</label>
            <input id="Invoice_start" name="Invoice_start" type="time" class="form-control" value="<?php echo strftime('%H:%M', strtotime($rowpro['Invoice_start']));          ?>">

            <label class="form-text">วันที่สิ้นสุดการชำระหนี้</label>
            <input id="Invoice_end" name="Invoice_end" type="date" class="form-control">





            <br><br>
            <input type="hidden" name="Queue_id_order" value="<?php echo $rowpro['Queue_id_order']; ?>">
            <input name="submit" type="submit" id="submit" class="btn btn-success" value="แก้ไขข้อมูล">
            </fieldset>
         </form>

      </div>
   </div>
   <!-- jQuery CDN - Slim version (=without AJAX) -->
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
   <!-- Popper.JS -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
   <!-- Bootstrap JS -->
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

   <script type="text/javascript">
      $(document).ready(function() {
         $('#sidebarCollapse').on('click', function() {
            $('#sidebar').toggleClass('active');
         });
      });
   </script>
   </div>
</body>

</html>