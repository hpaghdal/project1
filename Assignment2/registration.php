<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration</title>
    <link rel="stylesheet" href="login.css">

</head>
<body>
<div class="box">

<?php
require "database.php";
$fname=$_POST ['firstname'];//registration page
$lname=$_POST ['lastname'];//registration page
$email=$_POST ['email'];//registration page
$DOB=$_POST ['DOB'];//registration page
$password=$_POST ['password'];//registration page




function fnCheck($fname){
    $valid = true;
    if (empty($fname)){
        echo " First Name empty<br>";
        $valid = false;
    }
    if ($valid == true){
        echo " <br>First Name is Valid<br>";
    }
    return $valid;
}

function lnCheck($lname){
    $valid = true;
    if (empty($lname)){
        echo " Last Name empty<br>";
        $valid = false;
    }
    if ($valid == true){
        echo " Last Name is Valid<br>";
    }
    return $valid;
}

function eCheck($email)
{   $valid = true;
    if (empty($email)) {
        echo "Email Address empty<br>";
        $valid = false;}
    elseif (strpos($email, '@') === false) {
        echo("Email not valid!! missing @ <br>");
        $valid = false;}
    if ($valid == true){
        echo " Valid email<br>";
    }
    return $valid;
}

function dobCheck($DOB){
    $valid = true;
    if (empty($DOB)){
        echo " DOB empty<br>";
        $valid = false;
    }
    if ($valid == true){
        echo " DOB is Valid<br>";
    }
    return $valid;
}
function pCheck( $password){
    $valid = true;
    if ((strlen($password)==0)) {
        echo("<br>no password entered");
        $valid = false;
    } else if(strlen($password) <8) {
        echo("password needs to be 8 characters or more<br>");
        $valid = false;
    }

    if ($valid == true){
        echo " password is valid<br>";
    }
    return $valid;
}

if ( fnCheck($fname) && lnCheck($lname) && eCheck($email) && dobCheck($DOB) && pCheck( $password) ){

    $q = "select * from accounts where email='$email'";
    $q = $conn->prepare($q);
    $q->execute();
    $results = $q->fetchAll();
    $q->closeCursor();

    if(count($results) > 0) {
        echo " Email address already registered<br>";
        echo "<form action =\"registrationForm.php\" method= \"post\" >
      <input type=\"submit\" value=\"Back\">
  </form>";
    }

    else{
        $q = "insert into accounts (email, fname, lname, birthday, password) values (:email, :fname,:lname,:DOB,:password)";
        $statement = $conn->prepare($q);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':fname', $fname);
        $statement->bindValue(':lname', $lname);
        $statement->bindValue(':DOB', $DOB);
        $statement->bindValue(':password', $password);
        $statement->execute();
        $statement->closeCursor();
        echo " Registration successful<br>";
        header("Location: QPage.php?email=$email&fname=$fname&lname=$lname");
    }
}
else
    echo "<br> Registration not Complete<br>";
echo "<form action =\"registrationForm.php\" method= \"post\" >
          <input type=\"submit\" value=\"Back\">
      </form>";

?>


</div>
</body>
</html>
