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
$skillsArray=(explode(",",$skills));
?>
<!DOCTYPE HTML>
<html>
<head>
    <link rel="stylesheet" href="question.css">
    <div class="box">
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

        <!--Question Body-->
        Question Body:
        <?php
        if ((strlen($question)==0)) {
            echo("No question entered");
        }   else if(strlen($question) >500) {
            echo("Question body more then 500 characters, please shorten");
        }
        else {
            print($question);
        }
        ?>
        <br>

        <!--Skills-->
        Skills:
        <?php
        if (count($skillsArray)>=2)
            print_r ($skillsArray);
        else
            echo("needs to be 2 skills or more");



        ?><br>




    </main>
</body>
</html>

