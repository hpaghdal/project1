<link rel="stylesheet" href="question.css">
<div class="box">
<?php

include 'model/database.php';

$valid = true;

    if ($valid) {

        $valid = true;

        if ((strlen($questionTitle) == 0)) {
            echo("No question title entered<br>");
            $valid = false;
        } else if (strlen($questionTitle) < 3) {
            echo("Question title needs to be at least 3 characters<br>");
            $valid = false;
        }


        if (count($skillsArray) < 2) {
            echo("needs to be 2 skills or more<br>");
            $valid = false;
        }


        if ((strlen($questionbody) == 0)) {
            echo("No question Body entered<br>");
            $valid = false;
        } else if (strlen($questionbody) > 500) {
            echo("Question body more then 500 characters, please shorten<br>");
            $valid = false;
        }


        return $valid;


}

?>
<?php include ('view/footer.php');?>


