<?php session_start();
if (!isset($_SESSION["id"])) {
   header("location:login.php");
   exit(0);
} ?>
<?php
require "dbcon.php";

$email = $_SESSION['email'];
$name = $_SESSION['name'];
$surname = $_SESSION["surname"];
$ID = $_SESSION["id"];



$q = "SELECT * FROM db_user WHERE Email = '$email'";

$result = mysqli_query($conn, $q);
?>
<?php


//       $q = "SELECT * FROM queue INNER JOIN db_user
// ON queue.ID_user = db_user.ID;";

$q = "SELECT * FROM invoice INNER JOIN queue
ON invoice.Queue_id = queue.Queue_id_order
 where queue.ID_user = $ID";


$result = mysqli_query($conn, $q);
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
   <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
   
   <!-- Font Awesome JS -->
   <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
   <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

   <style type="text/css">
        * {
            padding: 0;
            margin: 0;
        }

        .label-container {
            position: fixed;
            bottom: 48px;
            right: 105px;
            display: table;
            visibility: hidden;
        }

        .label-text {
            color: #FFF;
            background: rgba(51, 51, 51, 0.5);
            display: table-cell;
            vertical-align: middle;
            padding: 10px;
            border-radius: 3px;
        }

        .label-arrow {
            display: table-cell;
            vertical-align: middle;
            color: #333;
            opacity: 0.5;
        }

        .float {
            position: fixed;
            width: 60px;
            height: 60px;
            bottom: 40px;
            right: 40px;
            background-color: rgb(70, 146, 247);
            color: #FFF;
            border-radius: 50px;
            text-align: center;
            box-shadow: 2px 2px 3px #999;
        }

        .my-float {
            font-size: 24px;
            margin-top: 18px;
        }

        a.float+div.label-container {
            visibility: hidden;
            opacity: 0;
            transition: visibility 0s, opacity 0.5s ease;
        }

        a.float:hover+div.label-container {
            visibility: visible;
            opacity: 1;
        }
    </style>
</head>

<body>
   <div class="wrapper">
      <!-- Sidebar  -->
      <nav id="sidebar">
         <div class="sidebar-header" style="text-align:center;">
            <a href="work.php"><img src="img/logoW.png" width="150px"></a>
            <h5 style="color:white;margin-top:10px">ชื่อผู้ใช้</h5>
            <p><?php echo $name ?></p>
            <a href="edit_pro.php"><button type="button" class="btn btn-primary">แก้ไขข้อมูลส่วนตัว</button></a>
         </div>

         <ul class="list-unstyled components">
            <p>เมนู</p>
            <li>
               <a href="mainpage.php">หน้าแรก</a>
            </li>
            <li>
               <a href="fn_queue.php">จองคิวซ่อมรถ</a>
            </li>
            <li class="active">
               <a href="fn_invoice.php">รายการที่ต้องชำระเงิน</a>
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
         <div class="table-responsive">
            <table class="table table-reflow table-bordered">
               <thead class="thead-dark">
                  <tr>
                     <!-- <th style="hide" รหัสวิชา> </th>-->
                     <th>
                        <center>หมายเลขใบชำระเงิน
                     </th>
                     </center>
                     <th>
                        <center>ปัญหาที่พบ
                     </th>
                     </center>
                     <th>
                        <center>ค่าใช้จ่ายทั้งหมด
                     </th>
                     </center>
                     <th>
                        <center>วันที่ออกใบชำระเงิน
                     </th>
                     </center>
                     <th>
                        <center>วันที่ครบกำหนดชำระ
                     </th>
                     </center>
                     <th>
                        <center>สถานะ
                     </th>
                     </center>

                  </tr>
               </thead>
               <?php
               while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                  ?>
                  <tbody>
                     <tr>

                        <td>
                           <center><?php echo $row['Invoice_order']; ?>
                        </td>
                        </center>
                        <td>
                           <center><?php echo $row['Invoice_found_problem']; ?>
                        </td>
                        </center>
                        <td>
                           <center><?php echo $row['Invoice_cost']; ?>
                        </td>
                        </center>
                        <td>
                           <center><?php echo $row['Invoice_start']; ?>
                        </td>
                        </center>
                        <td>
                           <center><?php echo $row['Invoice_end']; ?>
                        </td>
                        </center>
                        <td>
                           <center><?php echo $row['Invoice_status']; ?>
                        </td>
                        </center>

                        <!--<td><center><a href="JavaScript:if(confirm('Confirm Delete?') == true){window.location='delete_mokoall.php?j_number=
			   <?php echo $row["j_number"]; ?>';}"><button class="btn btn-danger">ลบ</button></a></td></center>-->


                     </tr>

                  </tbody>
               <?php
            }
            mysqli_free_result($result);
            mysqli_close($conn)
            ?>
            </table>
            </table>
         </div>
      </div>
   </div>
   <!-- jQuery CDN - Slim version (=without AJAX) -->
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
   <!-- Popper.JS -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
   <!-- Bootstrap JS -->
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
   <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

   <script type="text/javascript">
      $(document).ready(function() {
         $('#sidebarCollapse').on('click', function() {
            $('#sidebar').toggleClass('active');
         });
      });
   </script>
   </div>

   <a href="#" class="float">
        <i class="fa fa-comment my-float"></i>
    </a>
    <div class="label-container">
        <div class="label-text">Chat</div>
        <i class="fa fa-play label-arrow"></i>
    </div>

    <script>
    $(document).ready(function(){

        fetch_user();

        setInterval(function(){
            update_last_activity();
            fetch_user();
        }, 5000);

        function fetch_user()
        {
            $.ajax({
                url:"ms_fetch_user.php",
                method:"POST",
                success:function(data){
                    $('#user_details').html(data);
                }
            })
        }

        function update_last_activity()
        {
            $.ajax({
                url:"update_last_activity.php",
                success:function()
                {

                }
            })
        }
    });
    </script>
</body>

</html>