<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration error</title>
    <link rel="stylesheet" href="view/login.css">

</head>
<body>
<div class="box">

<?php




$valid = true;

if ($valid){
    $valid = true;
    if (empty($fname)){
        echo " First Name field is empty<br>";
        $valid = false;
    }

    if (empty($lname)){
        echo " Last Name field is empty<br>";
        $valid = false;
    }

    if (empty($email)) {
        echo "Email Address field is empty<br>";
        $valid = false;}
    elseif (strpos($email, '@') === false) {
        echo("Email is not valid, missing @ symbol. <br>");
        $valid = false;}

    if (empty($birth)){
        echo " Date of Birth field is empty<br>";
        $valid = false;
    }

    if ((strlen($pass)==0)) {
        echo("Password field is empty<br>");
        $valid = false;
    } else if(strlen($pass) <8) {
        echo("password needs to be 8 characters or more<br>");
        $valid = false;
    }


    return $valid;


}

?>

</div>
</body>
</html>
