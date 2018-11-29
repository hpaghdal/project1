<link rel="stylesheet" href="question.css">
<div class="box">
<?php

require "database.php";


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
        $title = $result['title'] . '<br>';
        $body = $result['body'] . '<br>';
        $skill = $result['skills'] . '<br>';

        echo "<br>Title: $title";
        echo "<br>Body: $body";
        echo "<br>Skills: $skill <br>";

    }
}

?>

<form action ="QForm.php?email=<?php echo $email ?>" method= "post" >
    <input type="submit" value="Add Question">
</form>
</div>

