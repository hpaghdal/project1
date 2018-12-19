<?php
class questiondb
{

    public static function auth($email, $password)
    {

        global $conn;
        $q = "select * from accounts where email='$email' and password='$password'";
        $q = $conn->prepare($q);
        $q->execute();
        $results = $q->fetchAll();
        $q->closeCursor();

        if (count($results) > 0) {
            return true;
        } else {
            echo "<br>Username or password is wrong, please try again.";
            return false;
        }

    }


    public static function getUserFromAccount($email)
    {
        global $conn;
        $q = "select * from accounts where email='$email'";
        $q = $conn->prepare($q);
        $q->execute();
        $results = $q->fetchAll();
        $q->closeCursor();

        if (count($results) > 0) {
            return true;
        } else {
            return false;
        }

    }


    public static function registration($email, $fname, $lname, $DOB, $password)
    {
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

    public static function getNameByEmail($email)
    {

        global $conn;
        $query = "SELECT * FROM accounts where email = '$email'";
        $statement = $conn->prepare($query);
        $statement->execute();
        $results = $statement->fetchAll();
        $statement->closeCursor();
        $account = new Account(
            $results['email'],
            $results['password'],
            $results['fname'],
            $results['lname'],
            $results['birthday']
        );
        $account->setId($results['id']);

        return $account;
    }

    public static function getIdByEmail($owneremail)
    {

        global $conn;
        $q = "SELECT * FROM accounts where email = '$owneremail'";
        $statement = $conn->prepare($q);
        $statement->execute();
        $results = $statement->fetchAll();
        $statement->closeCursor();

        foreach ($results as $result) {
            $ownerid = $result['id'];
        }
        return $ownerid;
    }
}

?>