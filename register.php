<?php
ob_start();
session_start();
if (isset($_SESSION['id']) != "") {
    header("Location: work.php");
}
include_once 'dbcon.php';
if (isset($_POST['signup'])) {                                      
    $type = 0 ; 
        $Email = $_POST["Email"];
		$upass = $_POST["password"];
        $name = $_POST["name"];
        $surname = $_POST["surname"];
        $address = $_POST["address"];
        $phone = $_POST["phone"];
    // hash password with SHA256;
    $password = hash('sha256', $upass);
    // check email exist or not
    $stmt = $conn->prepare("SELECT Email FROM db_user WHERE Email=?");
    $stmt->bind_param("s", $Email);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    $count = $result->num_rows;
    if ($count == 0) { // if email is not found add user
        $stmts = $conn->prepare("INSERT INTO db_user(Email, name, surname, address, phone, pass, type) VALUES(?, ?, ?,?,?,?,?)");
        $stmts->bind_param("sssssss", $Email, $name,$surname,$address,$phone,$password,$type);
        $res = $stmts->execute();//get result
        $stmts->close();
        $user_id = mysqli_insert_id($conn);
        if ($user_id > 0) {
            $_SESSION['id'] = $user_id; // set session and redirect to index page
            $_SESSION["email"] = $Email;
            $_SESSION["name"] = $name;
            $_SESSION["surname"] = $surname;
            $_SESSION["type"] = $type;
            if (isset($_SESSION['id'])) {
                print_r($_SESSION);
                header("Location: work.php");
                exit;
            }
        } else {
            $errTyp = "danger";
            $errMSG = "Something went wrong, try again";
        }
    } else {
        $errTyp = "warning";
        $errMSG = "Email is already used";
    }
}
?>

<!DOCTYPE html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Registration</title>
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
                                <h2 class="text-center py-4 font-bold font-up danger-text">สมัครสมาชิก</h2>    
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
                                    <i class="fa fa-envelope prefix grey-text"></i>
                                    <input type="email" id="form21" name="Email" class="form-control" required/>
                                    <label for="form21">อีเมล</label>
                                </div>
                                <div class="md-form">
                                </div>
                                <div class="md-form">
                                    <i class="fa fa-key prefix grey-text"></i>
                                    <input type="password" id="form31" name="password" class="form-control" required/>
                                    <label for="form31">รหัสผ่าน</label>
                                </div>        
                                

                                <div class="md-form">
                                    <i class="fa fa-user prefix grey-text"></i>
                                    <input type="text" name="name" id="form41" class="form-control">
                                    <label for="form41">ชื่อ</label>
                                </div>
                                <div class="md-form">
                                    <i class="fa fa-tag prefix grey-text"></i>
                                    <input type="text" name="surname" id="form51" class="form-control">
                                    <label for="form51">นามสกุล</label>
                                </div>
                                <div class="md-form">
                                <i class="fa fa-home prefix grey-text" ></i>                                 
                                 <textarea id="address" name="address" id="form121" class="form-control" ></textarea>
                                 <label for="form121">ที่อยู่</label>
                                </div>
                                <div class="md-form">
                                    <i class="fa fa-phone-square prefix grey-text"></i>
                                    <input type="text" id="form81" name="phone" class="form-control">
                                    <label for="form81">เบอร์โทรศัพท์</label>
                                </div>
                                <div class="checkbox" style="margin-left:10px;">
                                 <label><input type="checkbox" id="TOS" value="This"><a href="#" style="margin-left:10px;">ฉันยอมรับข้อตกลง</a></label>
                                 </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-danger btn-lg" name="signup" id="reg">สมัครสมาชิก</button>
                                </div>
                                <div class="text-center">
                                    <a class="btn btn-outline-success btn-lg" href="login.php">เข้าสู่ระบบ</a>
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