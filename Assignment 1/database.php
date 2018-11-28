///$firstName=$_POST ['firstname'];//registration page
///$lastName=$_POST ['lastname'];//registration page
///$email=$_POST ['email'];//registration page
///$DOB=$_POST ['DOB'];//registration page
///$password=$_POST ['password'];//registration page
///$questionTitle=$_POST ['questiontitle'];//Questions page
///$skills=$_POST ['skills'];//Questions page
///$question=$_POST ['question'];//Questions page

<?php
//check the connection
$username = 'hdp36';
$password = '2uWyJ1wp';
$hostname = 'sql1.njit.edu';
$dsn = "mysql:host=$hostname;dbname=$username";

try {
    $conn = new PDO($dsn, $username, $password);
    echo "Connected successfully<br>";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}


function runQuery($query) {
    global $conn;
    try {
        $q = $conn->prepare($query);
        $q->execute();
        $results = $q->fetchAll();
        $q->closeCursor();
        return $results;
    }
    catch (PDOException $e) {
        http_error("500 Internal Server Error\n\n"."There was a SQL error:\n\n" . $e->getMessage());
    }
}

function addUser($email,$fname,$lname,$birth,$pass) {
    global $conn;
    try {
        $query = "insert into accounts (email, fname, lname, birthday, password) values (:email, :fname,:lname,:birth,:pass)";
        $statement = $conn->prepare($query);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':fname', $fname);
        $statement->bindValue(':lname', $lname);
        $statement->bindValue(':birth', $birth);
        $statement->bindValue(':pass', $pass);
        $statement->execute();
        $statement->closeCursor();
        return $statement;
    }
    catch (PDOException $e) {
        http_error("500 Internal Server Error\n\n"."There was a SQL error:\n\n" . $e->getMessage());
    }
}

function addQuestion($owneremail, $ownerid,$datetime, $qname, $qbody, $qskill) {
    global $conn;
    try {

//owneremail, createddate, title, body, skills
        $query = "insert into questions (owneremail, ownerid, createddate, title, body, skills) values ( :owneremail, :ownerid, :datetime, :qname, :qbody,:qskill)";
        $statement = $conn->prepare($query);
        $statement->bindValue(':owneremail', $owneremail);
        $statement->bindValue(':ownerid', $ownerid);
        $statement->bindValue(':datetime', $datetime);
        $statement->bindValue(':qname', $qname);
        $statement->bindValue(':qbody', $qbody);
        $statement->bindValue(':qskill', $qskill);
        $statement->execute();
        $statement->closeCursor();
        echo " Insert successful";
    }
    catch (PDOException $e) {
        http_error("500 Internal Server Error\n\n"."There was a SQL error:\n\n" . $e->getMessage());
    }
}


?>