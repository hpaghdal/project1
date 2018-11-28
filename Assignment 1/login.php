<link rel="stylesheet" href="login.css">
<div class="box">
<?php
include 'database.php';


$email=$_POST ['email'];//Login Page
$password=$_POST ['password'];//Login Page
echo "Welcome, $email";
///$firstName=$_POST ['firstname'];//registration page
///$lastName=$_POST ['lastname'];//registration page
///$email=$_POST ['email'];//registration page
///$DOB=$_POST ['DOB'];//registration page
///$password=$_POST ['password'];//registration page
///$questionTitle=$_POST ['questiontitle'];//Questions page
///$skills=$_POST ['skills'];//Questions page
///$question=$_POST ['question'];//Questions page

?>
<!DOCTYPE HTML>
<html>
<head>
<body>
    <main>
        <!--Email-->
        E-mail:
        <?php

     if(strpos($email,'@')===false){
         echo("Email not valid");
     }
     else
         echo($email);

        ?><br>
        <!--Password-->
        Password:
        <?php
        if ((strlen($password)==0)) {
            echo("no password entered");
        } else if(strlen($password) <8) {
            echo("password needs to be 8 characters or more");
        } else {
            echo($password);

        }
//header('location: ./question.php');

  ?>
    </div>
    </main>
</body>
</html>

