<?php
///$user_name=$_POST ['email'];//Login Page
///$password=$_POST ['password'];//Login Page
///$firstName=$_POST ['firstname'];//registration page
///$lastName=$_POST ['lastname'];//registration page
///$email=$_POST ['email'];//registration page
///$DOB=$_POST ['DOB'];//registration page
///$password=$_POST ['password'];//registration page
$questionTitle=$_POST ['questiontitle'];//Questions page
$skills=$_POST ['skills'];//Questions page
$question=$_POST ['question'];//Questions page
?>
<!DOCTYPE HTML>
<html>
<head>
<body>
    <main>
        <!--Question name-->
        Question Title:
        <?php
        if ((strlen($questionTitle)==0)) {
            echo("No question title entered");
        } else if(strlen($questionTitle) <3) {
            echo("Question title needs to be at least 3 characters");
        } else {
            echo($questionTitle);
        }
        ?><br>
    <!--Skills-->
        Skills:
        <?php
    if ((strlen($skills)==0)) {
        echo("No skills entered");
    } else {
        echo($skills);
    }
        ?><br>

        <!--Question Body-->
        Question Body:
        <?php
        if ((strlen($question)==0)) {
            echo("No question entered");
         }   else if(strlen($question) >500) {
                echo("Question body more then 500 characters, please shorten");
        } else {
            echo($question);
        }
        ?><br>







    </main>
</body>
</html>
</head>