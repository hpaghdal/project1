<link rel="stylesheet" href="question.css">
<div class="box">
<?php

require "database.php";


$email = $_GET ['email'];
$fname = $_GET ['fname'];
$lname = $_GET ['lname'];

echo "<h2> Welcome $fname $lname </h2>";
//echo $email;

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
    echo "<h3> Question Not set yet !! Please Add Question</h3>";
}
else {
    foreach ($results as $result) {
        $title = $result['title'] . '<br>';
        $body = $result['body'] . '<br>';
        $skill = $result['skills'] . '<br>';

        echo "<br>This is Title: $title";
        echo "This is Question Body: $body";
        echo "This is Skills: $skill <br>";
    }
}

?>

<form action ="QForm.php?email=<?php echo $email ?>" method= "post" >
    <input type="submit" value="Add Question">
</form>
</div>

