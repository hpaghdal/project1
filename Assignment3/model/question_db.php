<?php
function questionDataByEmail($email){

    global $conn;
    $query = "SELECT * FROM questions where owneremail = '$email'";
    $statement = $conn->prepare($query);
    $statement->execute();
    $results = $statement->fetchAll();
    $statement->closeCursor();
    return $results;
}
?>