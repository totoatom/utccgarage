<?php
    ob_start();
    session_start();
    require 'dbcon.php';
    if($_SERVER["REQUEST_METHOD"]=="POST"){
	    $Queue_id_order = $_POST['Queue_id_order'];
		$Queue_Mechanic_name = $_POST['Queue_Mechanic_name'];
		$Queue_Status = $_POST['Queue_Status'];
        $Queue_end_date = $_POST['Queue_end_date'];
        $lan =implode(" ",$_POST ['s']);
        

    // $sql1 = "UPDATE queue SET Queue_Mechanic_name='$Queue_Mechanic_name' ,Queue_Status='$Queue_Status',Queue_end_date='$Queue_end_date' WHERE Queue_id_order='$Queue_id_order'";
    $sql1 = "UPDATE queue SET Queue_Mechanic_name='$Queue_Mechanic_name' ,Queue_Status='$Queue_Status',Queue_end_date='$lan' WHERE Queue_id_order='$Queue_id_order'";
	
	
	
	
	

$result1 = mysqli_query($conn, $sql1) or die ("Error in query: $sql1 " . mysqli_error($con));





if($result1){
            echo "<script>";
            echo "alert('บันทึกสำเร็จ');";
            echo "window.location ='ad_main.php';";
            echo "</script>";
        }
    
   
    }
   mysqli_close($con);

?>
