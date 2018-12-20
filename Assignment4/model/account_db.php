<?php
class Account_db
{

    public static function auth($email, $password)
    {

        $conn = Database::getDB();

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


    public static function getNameByEmail($email)
    {

        $conn = Database::getDB();

        $query = "SELECT * FROM accounts where email = '$email'";
        $statement = $conn->prepare($query);
        $statement->execute();
        $results = $statement->fetch();
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


    public static function registration($registration)
    {
        $conn = Database::getDB();

        $email = $registration -> getEmail();
        $fname = $registration -> getFname();
        $lname = $registration -> getLname();
        $birth = $registration -> getBirth();
        $pass = $registration -> getPass();

        $q = "insert into accounts (email, fname, lname, birthday, password) values (:email, :fname,:lname,:DOB,:password)";

        $statement = $conn->prepare($q);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':fname', $fname);
        $statement->bindValue(':lname', $lname);
        $statement->bindValue(':DOB', $birth);
        $statement->bindValue(':password', $pass);
        $statement->execute();
        $statement->closeCursor();
        return $statement;
        echo " Successfully Registered<br>";
    }
















    public static function getUserFromAccount($email)
    {
        $conn = Database::getDB();

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


    public static function getIdByEmail($owneremail)
    {

        $conn = Database::getDB();

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