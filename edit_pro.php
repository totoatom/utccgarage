<?php
ob_start();
session_start();
if (!isset($_SESSION['id']) != "") {
    header("Location: work.php");
}
include_once 'dbcon.php';

$name = $_SESSION['name'];
$surname = $_SESSION['surname'];
$address = $_SESSION["address"];
$phone = $_SESSION["phone"];
$id = $_SESSION['id'];

if (isset($_POST['edit'])) {                                        
        $name = $_POST["name"];
        $surname = $_POST["surname"];
        $address = $_POST["address"];
        $phone = $_POST["phone"];
    // hash password with SHA256;    
    // check email exist or not
    $stmt = $conn->prepare("SELECT * FROM db_user WHERE ID=?");
    $stmt->bind_param("s", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    $count = $result->num_rows;
    if ($count == 1) { // if email is not found add user
        $stmts = $conn->prepare("UPDATE db_user SET name = ?, surname = ?, address = ?, phone = ? WHERE ID = ?");
        $stmts->bind_param("sssss", $name,$surname,$address,$phone,$id);
        $res = $stmts->execute();//get result
        $stmts->close();
        $stmt = $conn->prepare("SELECT * FROM db_user Where ID=?");
    $stmt->bind_param("s", $id);
    /* execute query */
    $stmt->execute();
    //get result
    $res = $stmt->get_result();
    $stmt->close();
    $row = mysqli_fetch_array($res, MYSQLI_ASSOC);
    $count = $res->num_rows;
    if ($count == 1) {
        $_SESSION['id'] = $row['ID'];
        $_SESSION["email"] = $row["Email"];
        $_SESSION["name"] = $row["name"];
        $_SESSION["surname"] = $row["surname"];
        $_SESSION["type"] = $row["type"];
        echo "<script>";                        
                        echo "window.history.go(-2)";
                    echo "</script>";
    } elseif ($count == 1) {
        $errMSG = "Bad password";
    } else $errMSG = "User not found";
}
}
?>

<?php

    if (isset($_POST['edit'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $address = $_POST['address'];
        $phone = $_POST ['phone'];


            $sql = "UPDATE db_user SET name ='$name', surname = '$surname', address = '$address', phone = '$phone' WHERE ID='$id'";
            $result12 = mysqli_query($conn, $sql);

            if($result12){
                echo "<script>";
                echo "alert('อัพเดเทข้อมูลเรียบร้อย');";
                echo "window.location ='mainpage.php';";
                echo "</script>";
            }
            
            else 
                {
                    echo "<script>alert('ไม่สามารถบันทึกได้ครับ');
                    window.history.back()();</script>";
                    exit();
                }
    
        }
?>

<!DOCTYPE html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>แก้ไขข้อมูลส่วนตัว</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css"/>
    <link rel="stylesheet" href="css/style.css" type="text/css"/>
    <link href="css/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class="bg-dark">

<div class="container">
<div class="row justify-content-center" style="margin-top:20px;">
    <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <!-- Form contact -->
                            <form method="post" autocomplete="off">
                                <h2 class="text-center py-4 font-bold font-up danger-text">แก้ไขข้อมูลส่วนตัว</h2>    
                                <?php
                                    if (isset($errMSG)) {
                                        ?>
                                        <div class="form-group">
                                            <div class="alert alert-<?php echo ($errTyp == "success") ? "success" : $errTyp; ?>">
                                                <span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    ?>                           
                              
                                <div class="md-form">
                                    <i class="fa fa-user prefix grey-text"></i>
                                    <input type="text" name="name" id="form41" class="form-control" placeholder=<?php echo $name ?>>
                                    <label for="form41">ชื่อ</label>
                                </div>
                                <div class="md-form">
                                    <i class="fa fa-tag prefix grey-text"></i>
                                    <input type="text" name="surname" id="form51" class="form-control" placeholder=<?php echo $surname ?>>
                                    <label for="form51">นามสกุล</label>
                                </div>
                                <div class="md-form">
                                <i class="fa fa-home prefix grey-text" ></i>                                 
                                 <textarea id="address" name="address" id="form121" class="form-control"   placeholder=<?php echo $address ?>></textarea>
                                 <label for="form121">ที่อยู่</label>
                                </div>
                                <div class="md-form">
                                    <i class="fa fa-phone-square prefix grey-text"></i>
                                    <input type="text" id="form81" name="phone" class="form-control" placeholder=<?php echo $phone ?>>
                                    <label for="form81">เบอร์โทรศัพท์</label>
                                </div>                               
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success btn-lg" name="edit" id="reg">ยืนยัน</button>
                                </div>                               
                            </form>
                            <!-- Form contact -->
                        </div>
                    </div>
                </div>   
    </div>
</div>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/tos.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.4.1/js/mdb.min.js"></script>

</body>
</html>