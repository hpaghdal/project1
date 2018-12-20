<link rel="stylesheet" href="question.css">
<div class="box">
    <title>Your Questions Page</title>
<?php

if(count($results) < 1)
{
    echo "<h3> No questions yet click the 'Add Question' button to add your question</h3>";

}

else {
    foreach ($results as $result) {
        $id = $result['id'];
        $title = $result['title'] ;
        $body = $result['body'];
        $skill = $result['skills'];

        echo "<br>Title: $title";
        echo "<br>Body: $body";
        echo "<br>Skills: $skill <br>";

        echo "<button><a href = '.?action=QPage'>Back to Questions<a></td></button><br>";
        echo "<br><br>";
    }
}

?>
    <?php include ('view/footer.php');?>
