<?php
ob_start();
session_start();
require 'dbcon.php';
$type = $_SESSION['type'];
if(!isset($_SESSION['id']) || $type != 1){
   header("location:login.php");
   exit(0);
}
    require 'dbcon.php';
    if($_SERVER["REQUEST_METHOD"]=="GET"){
      $Queue_id   = $_GET['Queue_id_order'];
		$Invoice_status = 'ชำระเงินเสร็จสิ้น';
	

    $sql1 = "UPDATE invoice SET Invoice_status='$Invoice_status'  WHERE Queue_id='$Queue_id'";
	
	
	
	
	
	

$result1 = mysqli_query($conn, $sql1);





if($result1){
            echo "<script>";
            echo "alert('เปลี่ยนสถานะชำระเงิน');";
            echo "window.location ='ad_main.php';";
            echo "</script>";
        }
    
	
			else 
			{
				echo "<script>alert('ลูกค้าชำระเงินเรียบร้อยแล้ว ');window.history.back()();</script>";
				exit();
			}
	
   
    
   
    }
   mysqli_close($con);

?>
