<link rel="stylesheet" href="login.css">
<div class="box">
<?php

$username = 'hdp36';
$password = '2uWyJ1wp';
$hostname = 'sql1.njit.edu';
$dsn = "mysql:host=$hostname;dbname=$username";

try {
    $conn = new PDO($dsn, $username, $password);
    echo "Connected successfully<br>";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}


$email=$_POST ['email'];//Login Page
$password=$_POST ['password'];//Login Page
echo "<h1>Welcome, $email</h1>";
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
header('location: ./question.php');
        $conn = null;
  ?>
    </div>
    </main>
</body>
</html>

