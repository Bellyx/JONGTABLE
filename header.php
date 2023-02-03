<?php
session_start();
require("function/function.php");
?>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <meta name="copyright" content="MACode ID, https://macodeid.com/">

  

  <link rel="stylesheet" href="assets/css/maicons.css">

  <link rel="stylesheet" href="assets/css/bootstrap.css">

  <link rel="stylesheet" href="assets/vendor/animate/animate.css">

  <link rel="stylesheet" href="assets/css/theme.css">

  <script src="assets/js/jquery-3.5.1.min.js"></script>

  <script src="assets/js/bootstrap.bundle.min.js"></script>

  <script src="assets/js/google-maps.js"></script>

  <script src="assets/vendor/wow/wow.min.js"></script>

  <script src="assets/js/theme.js"></script>

  <script src="assets/datepicker/datetimepicker-master/jquery.datetimepicker.js"></script>

  <link href="assets/datepicker/datetimepicker-master/jquery.datetimepicker.css" rel="stylesheet" />

  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<?php  
$user_map = array( 1=>'<a style="color:red">Admin</a>',2=>'<a style="color:blue">Taker</a>',3=>'<a style="color:green">User</a>');
$booking_map = array( 0=>'<a style="color:red">Cancel</a>',1=>'<a style="color:blue">Pending</a>',2=>'<a style="color:green">Accept</a>',3=>'<a style="color:green">Complete</a>');
$approve_map = array( 0=>'<a style="color:red">ไม่อนุมัติ</a>',1=>'<a style="color:blue">รออนุมัติ</a>',2=>'<a style="color:green">อนุมัติ</a>');
?>
