<?php
session_start();
$chkpage = $GET['linkname'];
if($_SESSION["type"]=="0"){ //ถ้าเป็น user ให้กระโดดไปหน้า 
    if($chkpage == "pageIndex"){
        Header("Location: work.php");
    }else{
        Header("Location: mainpage.php");
    }
    

}

if ($_SESSION["type"]=="1"){  //ถ้าเป็น admin ให้กระโดดไปหน้า 

    Header("Location: Admin.php");

}
?>