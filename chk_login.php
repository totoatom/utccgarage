<!--  
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
    $_SESSION["id"] = $row["ID"];
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
?>  -->
<?php 
session_start();
 if(isset($_POST["btn-login"])){
				//connection
                  include("dbcon.php");
				//รับค่า user & password
                  $Username = ($_POST['Email']);
                  $upass = ($_POST['pass']);
                  $Password = hash('sha256', $upass);
				//query 
                  $sql="SELECT * FROM db_user Where Email='".$Username."' and pass='".$Password."' ";

                  $result = mysqli_query($conn,$sql);
				
                  if(mysqli_num_rows($result)==1){

                    $row = mysqli_fetch_array($result);
                    $_SESSION["email"] = $row["Email"];
                    $_SESSION["name"] = $row["name"];
                    $_SESSION["surname"] = $row["surname"];
                    $_SESSION["id"] = $row["ID"];
                    $_SESSION["type"] = $row["type"];

                    $sub_query = "
                    INSERT INTO login_details
                    (user_id)
                    VALUES ('".$row['ID']."')
                    ";
                    $statement = $conn->prepare($sub_query);
                    $statement->execute();
                    // $_SESSION['login_details_id'] = $conn->lastInsertId();

                    if($_SESSION["type"]=="0"){ //ถ้าเป็น user ให้กระโดดไปหน้า 

                        // $sub_query = "
                        // INSERT INTO login_details
                        // (user_id)
                        // VALUES ('".$row['ID']."')
                        // ";
                        // $statement = $conn->prepare($sub_query);
                        // $statement->execute();
                        // $_SESSION['login_details_id'] = $conn->lastInsertId();

                        Header("Location: mainpage.php");
                    }

                    if ($_SESSION["type"]=="1"){  //ถ้าเป็น admin ให้กระโดดไปหน้า 

                        // $sub_query = "
                        // INSERT INTO login_details
                        // (user_id)
                        // VALUES ('".$row['ID']."')
                        // ";
                        // $statement = $conn->prepare($sub_query);
                        // $statement->execute();
                        // $_SESSION['login_details_id'] = $conn->lastInsertId();

                        Header("Location: ad_main.php");

                    

                  }else{
                    echo "<script>";
                        echo "alert(\" user หรือ  password ไม่ถูกต้อง\");"; 
                        //echo "window.history.back()";
                    echo "</script>";

                  }

        }else{


             Header("Location: login.php"); //user & password incorrect back to login again

        }
    }
?>