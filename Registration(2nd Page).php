<?php
///$user_name=$_POST ['email'];//Login Page
///$password=$_POST ['password'];//Login Page
$firstName=$_POST ['firstname'];//registration page
$lastName=$_POST ['lastname'];//registration page
$email=$_POST ['email'];//registration page
$DOB=$_POST ['DOB'];//registration page
$password=$_POST ['password'];//registration page
///$questionTitle=$_POST ['questiontitle'];//Questions page
///$skills=$_POST ['skills'];//Questions page
///$question=$_POST ['question'];//Questions page
?>
<!DOCTYPE HTML>
<html>
<head>
<body>
<main>
    First Name: <?php echo $firstName;?><br>
    Last Name: <?php echo $lastName;?><br>
    E-mail: <?php echo $email;?><br>
    DOB: <?php echo $DOB;?><br>
    Password: <?php echo $password;?><br>

</main>
</body>
</html>
</head>