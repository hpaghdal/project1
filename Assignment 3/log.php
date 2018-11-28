<link rel="stylesheet" href="login.css">
<div class="box">
    <?php
    include 'database.php';


    $email=$_POST ['email'];//Login Page
    $password=$_POST ['password'];//Login Page


    ?>
    <!DOCTYPE HTML>
    <html>
    <head>
    <body>
    <main>
        <!--Email-->

        <?php
        function eCheck($email)
        {   $valid = true;
        if (empty($email)) {
            echo "You must enter a Email Address<br>";
            $valid = false;}
        elseif (strpos($email, '@') === false) {
                echo("<br>Email is invalid,  missing @ symbol ");
                $valid = false;}
        if ($valid == true){
            echo " <br>Valid email";
        }
        return $valid;
        }

        function pCheck( $password){
            $valid = true;
        if ((strlen($password)==0)) {
            echo("<br>please enter your password");
            $valid = false;
        } else if(strlen($password) <8) {
            echo("<br>password needs to be 8 characters or more");
            $valid = false;
        }

        if ($valid == true){
            echo " <br>password is valid";
            }
            return $valid;
        }

        if (eCheck($email) && pCheck( $password) ){
            global $conn;
            $q = "select * from accounts where email='$email' and password='$password'";
            $q = $conn->prepare($q);
            $q->execute();
            $results = $q->fetchAll();
            $q->closeCursor();

            if(count($results) > 0)
            {
                $fname = $results[0]['fname'];
                $lname = $results[0]['lname'];

                header("Location: QPage.php?email=$email&fname=$fname&lname=$lname");
            }else{
                echo "<br>Username or password is wrong, please try again.";
            }
        }
        else{
            echo" <br>Login failed please try again.";
        }

        ?>
</div>
</main>
</body>
</html>

