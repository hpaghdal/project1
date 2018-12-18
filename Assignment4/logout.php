<?php include 'header.php';  ?>

<?php
//LOGOUT.PHP
//SESSION
//session_set_cookie_params(0,"/~ti36/");
session_start();
//ERROR REPORT
//error_reporting(E_ERROR | E_Warning | E_PARSE | E_NOTICE);
//ini_set( 'display_errors', 1);
//include ("function.php");
session_destroy();
$message =  '<h2 style="color: orangered; text-align: center ">You are being logged out.<h2><br>';
$target = ".";
header("location:logForm.php");
exit();
?>
<?php include ('footer.php');?>
<?php //include 'footer.php'; ?>