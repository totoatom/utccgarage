<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
   

   if($_SERVER["REQUEST_METHOD"]=="POST"){
        include "dbcon.php";
		$id = $_POST["ID_user"];
		$Queue_Status = 'รอการตรวจสอบ';
		$Queue_Brand_car = $_POST["Queue_Brand_car"];
		$Queue_problem_car = $_POST["Queue_problem_car"];
		$Queue_date = $_POST["Queue_date"];
		$Queue_plate_car = $_POST["Queue_Number_car"];
		$Queue_model_car = $_POST["Queue_model_car"];
		$Queue_color_car = $_POST["Queue_color_car"];
  	
 $sql1 = "INSERT INTO `queue` 
 (Queue_Brand_car,Queue_problem_car,Queue_date,Queue_plate_car,Queue_model_car,Queue_color_car,ID_user,Queue_Status,Queue_Start )
 VALUES
 ('$Queue_Brand_car','$Queue_problem_car','$Queue_date','$Queue_plate_car','$Queue_model_car','$Queue_color_car','$id','$Queue_Status',now())";
 
	$result1 = mysqli_query($conn, $sql1);


	 

if($result1){
	echo "<script type='text/javascript'>";
		echo "alert('Save Succesfuly');";
		echo "window.location ='mainpage.php'; ";
		echo "</script>";

	}


		
			}
			else 
			{
				echo "<script>alert('ไม่สามารถบันทึกได้ครับ');window.history.back()();</script>";
				exit();
			}
	
							 
mysqli_close($conn);
   
?>