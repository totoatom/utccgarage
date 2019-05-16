<!-- 
ob_start();
session_start();
require_once 'dbcon.php';
// if session is set direct to index
if (isset($_SESSION['id'])) {
    header("Location: work.php");
    exit;
}
if (isset($_POST['btn-login'])) {
    $email = $_POST['Email'];
    $upass = $_POST['pass'];
    $password = hash('sha256', $upass); // password hashing using SHA256
    $stmt = $conn->prepare("SELECT * FROM db_user Where Email=?");
    $stmt->bind_param("s", $email);
    /* execute query */
    $stmt->execute();
    //get result
    $res = $stmt->get_result();
    $stmt->close();
    $row = mysqli_fetch_array($res, MYSQLI_ASSOC);
    $count = $res->num_rows;
    if ($count == 1 && $row['pass'] == $password) {
        $_SESSION['id'] = $row['ID'];
        $_SESSION["email"] = $row["Email"];
        $_SESSION["name"] = $row["name"];
        $_SESSION["surname"] = $row["surname"];
        $_SESSION["address"] = $row["address"];
        $_SESSION["phone"] = $row["phone"];
        $_SESSION["type"] = $row["type"];
        header("Location: work.php");
    } elseif ($count == 1) {
        $errMSG = "Bad password";
    } else $errMSG = "User not found";
}
?> -->

<!DOCTYPE html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Login</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="css/style.css" type="text/css" />
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
                        <form method="post" action="chk_login.php" autocomplete="off">
                            <h2 class="text-center py-4 font-bold font-up danger-text">เข้าสู่ระบบ</h2>
                         
                            <div class="md-form">
                                <i class="fa fa-envelope prefix grey-text"></i>
                                <input type="email" id="form21" name="Email" class="form-control" required />
                                <label for="form21">อีเมล</label>
                            </div>
                            <div class="md-form">
                            </div>
                            <div class="md-form">
                                <i class="fa fa-key prefix grey-text"></i>
                                <input type="password" id="form31" name="pass" class="form-control" required />
                                <label for="form31">รหัสผ่าน</label>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-success btn-lg" name="btn-login">เข้าสู่ระบบ</button>
                            </div>
                            <div class="form-group">
                                <hr />
                            </div>
                            <div class="text-center">
                                <a class="btn btn-outline-danger btn-lg" href="register.php">สมัครสมาชิก</a>
                                <a class="btn btn-outline-danger btn-lg" href="work.php">กลับหน้าหลัก</a>
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
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.4.1/js/mdb.min.js"></script>
</body>

</html>