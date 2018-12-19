<?php include 'header.php';  ?>

<?php
session_start();
session_destroy();
header("Location:.");
exit();
?>
<?php include ('footer.php');?>
