
<html>
<head>
    <link rel="stylesheet" href="question.css">
    <div class="box">
<body>
<main>

    <!--Question name-->

<?php
require "database.php";
$questionTitle=$_POST ['questiontitle'];//Questions page
$skills=$_POST ['skills'];//Questions page
$question=$_POST ['questionbody'];//Questions page
$skillsArray=(explode(",",$skills));



function tCheck($questionTitle)
{
    $valid = true;
    if (empty($questionTitle)) {
        echo("bbbbbbbbbbbNo question title entered<br>");
        $valid = false;
    } elseif (strlen($questionTitle) < 3) {
        echo("Question title needs to be at least 3 characters<br>");
        $valid = false;
    }


    if ($valid == true){
        echo "valid title<br>";
    }
    return $valid;
}

    if ((strlen($question)==0)) {
        echo("No question entered<br>");
    }   else if(strlen($question) >500) {
        echo("Question body more then 500 characters, please shorten");
    }
    else {
        print($question);
    }

    if (count($skillsArray)>=2)
        print_r ($skillsArray);
    else
        echo("needs to be 2 skills or more<br>");



    ?>




</main>
</body>
</html>

