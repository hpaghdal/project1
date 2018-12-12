<link rel="stylesheet" href="view/login.css">
<div class="box">
    <?php
    //include 'model/database.php';
    ?>
    <!DOCTYPE HTML>
    <html>
    <head>
    <body>
    <main>
        <!--Email-->

        <?php
//        function eCheck($email)
//        {
        $valid = TRUE;
    if ($valid) {
        $valid = true;
        if (empty($email)) {
            echo "You must enter a Email Address<br>";
            $valid = false;}
        else if (strpos($email, '@') === false) {
            echo("<br>Email is invalid,  missing @ symbol ");
            $valid = false;
        }

        if ((strlen($password)==0)) {
            echo("<br>please enter your password");
            $valid = false;
        }
        else if(strlen($password) <8) {
            echo("<br>password needs to be 8 characters or more");
            $valid = false;
        }

//        if ($valid == true){
//            echo " <br>password is valid";
//            }
//            return $valid;
//        }
        return $valid;
        }



        ?>
</div>
</main>
</body>
</html>
<?php include ('view/footer.php');?>


