<?php
ob_start();
session_start();
require_once 'dbcon.php';
if(!isset($_SESSION["id"])) {
    header( "location:login.php");
    exit(0);
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>อู่ซ่อมรถ</title>    
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/loader.js"></script>
    <link href="css/style.css" rel="stylesheet" type="text/css" >
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="css/mdb.min.css" rel="stylesheet">
    <style>
   
    </style>

</head>
<body id="body">
</body>
</html>