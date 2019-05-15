<?php
  ob_start();
  session_start();
  require "dbcon.php";
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

    <title>TNS Service</title>

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
                    <a href="#">พูดคุย</a>
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

            <form action="bn_Manage_queue.php" method="post" enctype="multipart/form-data" id="form1">
  	<h2> จัดการคิว </h2>
		
                    <label class="form-text">ยี่ห้อรถ</label>
                   <input id="Queue_Brand_car" name="Queue_Brand_car" class="form-control" value="<?php echo   $rowpro['Queue_Brand_car']; ?>"disabled>
               
                    <label class="form-text">ปัญหาของรถ</label>
                   <input id="Queue_problem_car" name="Queue_problem_car" class="form-control"value="<?php echo   $rowpro['Queue_problem_car']; ?>"disabled>
                
                    <label class="form-text">วันที่ลูกค้าต้องการเข้า</label>
                   <input class="form-control"value="<?php echo   $rowpro['Queue_date']; ?>"disabled>
                
                   <label class="form-text">วันที่สามารถนำรถเข้าการซ่อมได้</label>
                   <!-- <input id="Queue_end_date" name="Queue_end_date" type="date" class="form-control"> -->
                   <input id="s[]" name="s[]" type="date" class="form-control"value="<?php echo strftime('%Y-%m-%d',strtotime($rowpro['Queue_end_date']));  ?>">
                   <label class="form-text">เวลาที่เข้ารับการซ่อม</label>
                   <input id="s[]" name="s[]" type="time" class="form-control"value="<?php echo strftime('%H:%M',strtotime($rowpro['Queue_end_date']));  ?>">
               
                    <label class="form-text">ชื่อช่าง</label>
                   <!-- <input id="Queue_Mechanic_name" name="Queue_Mechanic_name"  class="form-control"> -->
                   <select name="Queue_Mechanic_name" class ="form-control">
                        <option value="นายดำ">นายดำ</option>
                        <option value="นายแดง">นายแดง</option>
                    </select>
                
                    <label class="form-text">ทะเบียนรถ</label>
                   <input id="Queue_plate_car" name="Queue_plate_car" class="form-control"value="<?php echo  $rowpro['Queue_plate_car']; ?>"disabled>
               
                   <label class="form-text">สถานะ</label>
                   <select name="Queue_Status" class ="form-control" REQUIRED>
                        <option value=""></option>
                        <option value="รอนำรถเข้าตรวจเช็ค">รอนำรถเข้าตรวจเช็ค</option>
                        <option value="กำลังซ่อม">กำลังซ่อม</option>
                        <option value="เสร็จสิ้น">เสร็จสิ้น</option>
                    </select>
                
			
         <br><br>
         <input type="hidden" name="Queue_id_order" value="<?php echo $rowpro['Queue_id_order']; ?>">
          <br>
         <input name="submit" type="submit" id="submit"  class="btn btn-success" value="แก้ไขข้อมูล">
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
