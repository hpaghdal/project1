<link rel="stylesheet" href="../view/question.css">
<div class="box">
<?php

include 'model/database.php';

$owneremail = $_GET['email'];
$questionTitle=$_POST ['questiontitle'];//Questions page
$skills=$_POST ['skills'];//Questions page
$questionbody=$_POST ['questionbody'];//Questions page
$skillsArray=(explode(",",$skills));
$datetime =  date('Y-m-d H:i:s');

function tCheck($questionTitle)
{   $valid = true;

    if ((strlen($questionTitle)==0)) {
        echo("No question title entered<br>");
        $valid = false;
    } else if(strlen($questionTitle) <3) {
        echo("Question title needs to be at least 3 characters<br>");
        $valid = false;
    }

    if ($valid == true){
        echo " <br>Valid Title<br>";
    }
    return $valid;
}

function sCheck($skillsArray)
{   $valid = true;
    if (count($skillsArray)<2) {
        echo("needs to be 2 skills or more<br>");
        $valid = false;
    }
    if ($valid == true){
        echo " <br>Valid skills<br>";
    }
    return $valid;
}


function bCheck($questionbody)
{   $valid = true;

    if ((strlen($questionbody)==0)) {
        echo("No question Body entered<br>");
        $valid = false;
    }   else if(strlen($questionbody) >500) {
        echo("Question body more then 500 characters, please shorten<br>");
        $valid = false;
    }

    if ($valid == true){
        echo " <br>Valid question body<br>";
    }
    return $valid;
}



if (tCheck($questionTitle) && sCheck($skillsArray) && bCheck($questionbody) ){
    global $conn;
    $q = "SELECT * FROM accounts where email = '$owneremail'";
    $statement = $conn->prepare($q);
    $statement->execute();
    $results = $statement->fetchAll();
    $statement->closeCursor();

    foreach ($results as $result) {
        $ownerid = $result['id'];
        $fname = $result['fname'];
        $lname = $result['lname'];
    }

    $query = "insert into questions (owneremail, ownerid, createddate, title, body, skills) values ( :owneremail, :ownerid, :datetime, :questionTitle, :questionbody,:skills)";
    $statement = $conn->prepare($query);
    $statement->bindValue(':owneremail', $owneremail);
    $statement->bindValue(':ownerid', $ownerid);
    $statement->bindValue(':datetime', $datetime);
    $statement->bindValue(':questionTitle', $questionTitle);
    $statement->bindValue(':questionbody', $questionbody);
    $statement->bindValue(':skills', $skills);
    $statement->execute();
    $statement->closeCursor();
    echo " Insert successful";

    header("Location: QPage.php?email=$owneremail&fname=$fname&lname=$lname");
}
?>


