<?php 
session_start();
require_once 'dbcon.php';
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
        $_SESSION['user'] = $row['ID'];
        echo "alert(\" user หรือ  password ไม่ถูกต้อง\");"; 
        header("Location: chk_page.php");
    } elseif ($count == 1) {
        echo "<script>";
                        echo "alert(\" user หรือ  password ไม่ถูกต้อง\");"; 
                        echo "window.history.back()";
                    echo "</script>";

    } else {
     echo "<script>";
     echo "alert(\" ไม่พบ email ผู้ใช้งาน\");"; 
    echo "window.history.back()";
    echo "</script>";
    }
}
?>