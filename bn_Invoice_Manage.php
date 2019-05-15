<?php
		ob_start();
		session_start();
    require 'dbcon.php';
    if($_SERVER["REQUEST_METHOD"]=="POST"){
		// $Invoice_order = $_POST['Invoice_order'];
		$Queue_id = $_POST['Queue_id_order'];
		$Invoice_found_problem = $_POST['Invoice_found_problem'];
		$Invoice_cost = $_POST['Invoice_cost'];
		// $Invoice_start = $_POST['Invoice_start'];
		$Invoice_end = $_POST['Invoice_end'];
		$Invoice_status	 = 'รอชำระค่าบริการ';
		

//  $sql1 = "INSERT INTO `invoice` 
//  (Queue_id,
//  Invoice_found_problem,
// --  Invoice_start,
//  Invoice_cost,
//  Invoice_end,
//  Invoice_status)
//  VALUES
//  ('$Queue_id','$Invoice_found_problem','$Invoice_cost','$Invoice_end','$Invoice_status')";
 
	
 $sql1 = "UPDATE invoice SET Invoice_found_problem='$Invoice_found_problem' ,Invoice_cost='$Invoice_cost'
  WHERE Queue_id ='$Queue_id'";



$result1 = mysqli_query($conn, $sql1) ;


if($result1){
            echo "<script>";
            echo "alert('บันทึกสำเร็จ');";
            echo "window.location ='ad_main.php';";
            echo "</script>";
        }
    
	
			else 
			{
				echo "<script>alert('ท่านกำลังทำรายการซ้ำ');window.history.back()();</script>";
				exit();
			}
	
   
   }
   mysqli_close($con);

?>
