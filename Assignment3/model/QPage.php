<link rel="stylesheet" href="question.css">
<div class="box">
<?php

include 'model/database.php';


$email = $_GET ['email'];
$fname = $_GET ['fname'];
$lname = $_GET ['lname'];

echo "<h1> Welcome: $fname $lname </h1>";


global $conn;
$query = "SELECT * FROM questions where owneremail = '$email'";
//$results = runQuery($query);
$statement = $conn->prepare($query);
$statement->execute();
$results = $statement->fetchAll();
$statement->closeCursor();
//$statement->debugDumpParams();

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

        echo "<a href = 'edit.php?id=$id&&title=$title&&skills=$skill&&body=$body'>edit<a></td><br>";
        echo "<a href = 'edit.php?id=$title'>delete<a></td><br><br>";
    }
}

?>
    <form action ="QForm.php?email=<?php echo $email ?>" method= "post" >
        <input type="submit" value="Add Question">

<!--    <form action ="edit.php" method= "post" >-->
<!--        <input type="hidden" name="id" value="--><?php //echo $questions['id'];?><!--">-->
<!--        <input type="hidden" name="title" value="--><?php //echo $questions['title'];?><!--">-->
<!--        <input type="hidden" name="skills" value="--><?php //echo $questions['skills'];?><!--">-->
<!--        <input type="hidden" name="body" value="--><?php //echo $questions['body'];?><!--">-->
<!--        <input type="submit" value="EDIT">-->
<!--    </form>-->
<!--    <form action ="deleteQuestion.php" method= "post" >-->
<!--        <input type="hidden" name="id" value="--><?php //echo $questions['id'];?><!--">-->
<!--        <input type="submit" value="DELETE">-->
<!--    </form>-->
<!---->
<!--<form action ="QForm.php?email=--><?php //echo $email ?><!--" method= "post" >-->
<!--    <input type="submit" value="Add Question">-->
</form>
</div>

