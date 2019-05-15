<?php session_start();
// $link = $_GET['link'];
if (!isset($_SESSION["id"])) {

    header("location:login.php?link=".$link);
    exit(0);
}


?>
<?php
require "dbcon.php";

$email = $_SESSION['email'];
$name = $_SESSION['name'];
$surname = $_SESSION["surname"];




$q = "SELECT * FROM queue INNER JOIN db_user
    ON queue.ID_user = db_user.ID WHERE Email = '$email'";

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
                <a href="edit_pro.php"><button type="button" class="btn btn-primary">แก้ไขข้อมูลส่วนตัว</button></a>
            </div>

            <ul class="list-unstyled components">
                <p>เมนู</p>
                <li class="active">
                    <a href="mainpage.php">หน้าแรก</a>
                </li>
                <li>
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
            <div class="table-responsive">
                <table class="table table-reflow table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>
                                <center>หมายเลขคิว
                            </th>
                            </center>
                            <th>
                                <center>ยี่ห้อรถ
                            </th>
                            </center>
                            <th>
                                <center>รุ่นรถ
                            </th>
                            </center>
                            <th>
                                <center>สีรถ
                            </th>
                            </center>
                            <th>
                                <center>ปัญหา
                            </th>
                            </center>
                            <th>
                                <center>ชื่อช่าง
                            </th>
                            </center>
                            <th>
                                <center>วันที่สามารถนำรถเข้า
                            </th>
                            </center>
                            <th>
                                <center>สถานะ
                            </th>
                            </center>
                            <th>
                                <center>ในกรณีที่ไม่สะดวกกรุณาติดต่อกับเจ้าหน้าที่
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
                                    <center><?php echo $row['Queue_id_order']; ?>
                                </td>
                                </center>
                                <td>
                                    <center><?php echo $row['Queue_Brand_car']; ?>
                                </td>
                                </center>
                                <td>
                                    <center><?php echo $row['Queue_model_car']; ?>
                                </td>
                                </center>
                                <td>
                                    <center><?php echo $row['Queue_color_car']; ?>
                                </td>
                                </center>
                                <td>
                                    <center><?php echo $row['Queue_problem_car']; ?>
                                </td>
                                </center>
                                <td>
                                    <center><?php echo $row['Queue_Mechanic_name']; ?>
                                </td>
                                </center>
                                <td>
                                    <center><?php echo $row['Queue_end_date']; ?>
                                </td>
                                </center>
                                <td>
                                    <center><?php echo $row['Queue_Status']; ?>
                                </td>
                                </center>
                                <td>
                                    <center><a href=""><button>ติดต่อเจ้าหน้าที่</button></a>
                                </td>
                                </center>


                            </tr>
                        </tbody>

                    <?php
                }
                mysqli_free_result($result);
                mysqli_close($conn)
                ?>
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