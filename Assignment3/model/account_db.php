<?php

function auth($email, $password){
    global $conn;
    $q = "select * from accounts where email='$email' and password='$password'";
    $q = $conn->prepare($q);
    $q->execute();
    $results = $q->fetchAll();
    $q->closeCursor();

    if(count($results) > 0){
//        $fname = $results[0]['fname'];
//        $lname = $results[0]['lname'];
//
//        header("Location: .?email=$email");
        return true;
    }
    else{
        echo "<br>Username or password is wrong, please try again.";
        return false;
    }

}


function getUserFromAccount($email){
    global $conn;
    $q = "select * from accounts where email='$email'";
    $q = $conn->prepare($q);
    $q->execute();
    $results = $q->fetchAll();
    $q->closeCursor();

    if(count($results) > 0){
        return true;
    }
    else{
       // echo "<br>Username or password is wrong, please try again.";
        return false;
    }

}



function registration($email,$fname,$lname,$DOB,$password){
    global $conn;
    $q = "insert into accounts (email, fname, lname, birthday, password) values (:email, :fname,:lname,:DOB,:password)";
    $statement = $conn->prepare($q);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':fname', $fname);
    $statement->bindValue(':lname', $lname);
    $statement->bindValue(':DOB', $DOB);
    $statement->bindValue(':password', $password);
    $statement->execute();
    $statement->closeCursor();
    echo " Successfully Registered<br>";
}
?>