<?php
class Question_db
{


   public static function questionDataByEmail($email)
    {

        $conn = Database::getDB();
        $query = "SELECT * FROM questions where owneremail = '$email'";
        $statement = $conn->prepare($query);
        $statement->execute();
        $results = $statement->fetchAll();
        $statement->closeCursor();

        $question = new Question(
            $results['owneremail'],
            $results['ownerid'],
            $results['createddate'],
            $results['title'],
            $results['body'],
            $results['skills']
        );
        $question->setId($results['id']);
        return $question;
    }


   public static function question($question)
    {
        $conn = Database::getDB();

        $owneremail = $question -> getOwneremail();
        $ownerid = $question -> getOwnerid();
        $datetime = $question -> getDateTime();
        $questionTitle = $question -> getQuestionTitle();
        $questionbody = $question -> getQuestionbody();
        $skills = $question -> getSkills();

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
    }

   public static function getdataFromQuesById($id)
    {
        $conn = Database::getDB();

        $query = "SELECT * FROM questions where id = '$id'";
        $q = $conn->prepare($query);
        $q->execute();
        $results = $q->fetchAll();
        $q->closeCursor();
        return $results;
    }

    public static function updateQue($id, $questionTitle, $questionbody, $skills)
    {

        $conn = Database::getDB();

        $query = "update questions set title = :questionTitle, body= :questionbody, skills = :skills where id = '$id'";
        $statement = $conn->prepare($query);
        $statement->bindValue(':questionTitle', $questionTitle);
        $statement->bindValue(':questionbody', $questionbody);
        $statement->bindValue(':skills', $skills);
        $statement->execute();
        $statement->closeCursor();
    }


    public static function deleteQues($id)
    {
        $conn = Database::getDB();
        $query = "DELETE FROM questions WHERE id = '$id'";
        $statement = $conn->prepare($query);
        $statement->execute();
        $statement->closeCursor();
    }
}
?>