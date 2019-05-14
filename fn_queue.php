<?php session_start();
if(!isset($_SESSION["id"])) {
       header( "location:login.php");
exit(0);} ?>
<?php

   require 'dbcon.php';
     $id = $_SESSION['id'];
	 $user = $_SESSION['name'];
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
                <p><?php echo $user ?></p>
                <button type="button" class="btn btn-primary">แก้ไขข้อมูลส่วนตัว</button>
            </div>

            <ul class="list-unstyled components">
                <p>เมนู</p>
                <li>
                <a href="mainpage.php">หน้าแรก</a>
                </li>
                <li class="active">
                    <a href="fn_queue.php">จองคิวซ่อมรถ</a>
                </li>
                <li>
                <a href="fn_invoice.php">รายการที่ต้องชำระ</a>
                </li>
                <li>
                <a href="logout.php">ออกจากระบบ</a>    
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
                    <h2 class="justify-content-center">User-Dashboard</h2>

                    <!-- Links -->

                </div>
            </nav>
            <form method="POST" id="upform" action="bn_queue.php" >

<br>
<div class="container-fluid">
<h2 align="center">จองคิวซ่อมรถ</h2>
       
        
            
                <label class="form-text">ยีห้อรถ</label>
               <!-- <input id="Queue_Brand_car" name="Queue_Brand_car" class="form-control"> -->
               <select name="Queue_Brand_car" class ="form-control" style="background-color: #eaebe6;">
                    <option value="Toyota">Toyota</option>
                    <option value="Isuzu">Isuzu</option>
                    <option value="Honda">Honda</option>
                    <option value="Mitsubisi">Mitsubisi</option>
                    <option value="Ford">Ford</option>
                    <option value="Nissan">Nissan</option>
                    <option value="Mazada">Mazada</option>
                    <option value="Suzuki">Suzuki</option>
                    <option value="Chevrolet">Chevrolet</option>
                    <option value="Mercedes-Ben">Mercedes-Benz</option>
                    <option value="BMW">BMW</option>
                    <option value="MG">MG</option>
                    <option value="Volvo">Volvo</option>
                </select>
           
           
                <label class="form-text">รุ่นรถ</label>
                <input id="Queue_model_car" name="Queue_model_car" class="form-control" style="background-color: #eaebe6;">
          
                <label class="form-text">วันที่ต้องการเข้า</label>
               <!-- <input id="Queue_date" name="Queue_date" type="date" class="form-control"> -->
               <input type="datetime-local" id="Queue_date" name="Queue_date" value="" class="form-control" style="background-color: #eaebe6;">
           
                <label class="form-text">สีรถ</label>
               <input id="Queue_color_car" name="Queue_color_car" class="form-control" style="background-color: #eaebe6;">
           
                <label class="form-text">ทะเบียนรถ</label>
               <input id="Queue_Number_car" name="Queue_Number_car" class="form-control" style="background-color: #eaebe6;">
            
                <label class="form-text">ปัญหาของรถ</label>
               <textarea id="Queue_problem_car" style="background-color: #eaebe6;" name="Queue_problem_car"  class="form-control " > </textarea>
          
        
        
            <input id="ID_user" name="ID_user" type="hidden" value="<?php echo ($user); ?>">
            <input name="submit" type="submit" id="submit"  class="btn btn-success btn-lg btn-block" style="margin-top:15px">
                  
        
    <br />
        
        

    
     


   
 </form>
 </div>
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
