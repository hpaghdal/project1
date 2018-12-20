<?php include 'view/header.php';  ?>
<?php

require('model/database.php');
require('model/account_db.php');
require('model/questiondb.php');
require ('model/question_db.php');
require ('model/Question.php');
require ('model/Account.php');
//require('model/QPage.php');
//require('model/ques.php');
//require('model/registration.php');

//CHECK THE VALUE IF ITS NULL
$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'loginForm';
    }
}

if ( $action == 'loginForm'){

    session_start();
    $_SESSION["logged"] === True;
//
//    isset($_SESSION['login']) == true;
//    isset($_SESSION['login']) == true;
    include('view/logForm.php');
}
//LOGIN ACTION
else if ($action == 'signin') {
    // Start the session
    session_start();
    $email= $_POST ['email'];//Login Page


//     Set session variable
    $_SESSION["email"] = $email;
    //$_SESSION["logged"] === True;
    //$_SESSION["logged"] === True;


    $password=$_POST ['password'];//Login Page
    include('log.php');
    $results = Account_db::auth ($email, $password);
    if ($valid && $results ){

        header("Location:.?action=QPage");
    }
    else
        $error= "<br>Wrong username or password, please try again";
}
else if ( $action == 'showreg'){
    session_start();

    include('view/registrationForm.php');
}
else if ($action == 'registration') {
    session_start();

    $fname=$_POST ['firstname'];//registration page
    $lname=$_POST ['lastname'];//registration page
    $email=$_POST ['email'];//registration page
    $birth=$_POST ['DOB'];//registration page
    $pass=$_POST ['password'];//registration page
    $_SESSION["email"] = $email;
    include('registration.php');
    $results = Account_db::getUserFromAccount($email);
    if ($valid) {
        if ($results) {
            echo " this email address is already registered !! please use another email.<br>";
        }
        else {
            $registration= new Account($email,$pass,$fname,$lname,$birth);
            Account_db::registration($registration);
            header("Location:?action=QPage");
        }
    }
    else {

//        redirect(" <h2><b style=\"color: red; text-align: center \"> Registration not Complete </b> <h2>", "?action=finalPage'");
    }
}

else if ( $action == 'showNewQuestion'){
    session_start();

    $email= $_POST ['email'];//Login Page
    include('view/QForm.php');
}
else if ($action == 'addNewQuestion') {

    $owneremail = $_POST['email'];
    $questionTitle= $_POST ['questiontitle'];//Questions page
    $skills=$_POST ['skills'];//Questions page
    $questionbody=$_POST ['questionbody'];//Questions page
    $skillsArray=(explode(",",$skills));
    $datetime =  date('Y-m-d H:i:s');
    $ownerid = Account_db::getIdByEmail($owneremail);
    $_SESSION["email"] = $owneremail;
    include('ques.php');
    if ($valid){

        $question= new Question($owneremail,$ownerid,$datetime,$questionTitle,$questionbody,$skills);
        echo 'test';
        Question_db::question($question);

        //addNewQuestion($owneremail,$ownerid,$datetime,$questionTitle,$questionbody,$skills);
       // header("Location:?action=QPage");

    }
    else{
        echo ' Try again';
    }
}

else if ($action == 'editQues') {
    session_start();

    $id = $_GET['id'];
    //$email = $_GET['email'];
    $email=$_SESSION["email"] ;
    $getdataFromQues = getdataFromQuesById ($id);
    include('edit.php');
}

else if ($action == 'updateQues') {
    session_start();


    $owneremail = $_POST['email'];
    $id = $_POST['id'];
    $questionTitle= $_POST ['questiontitle'];//Questions page
    $skills=$_POST ['skills'];//Questions page
    $questionbody=$_POST ['questionbody'];//Questions page
    $skillsArray=(explode(",",$skills));
    $datetime =  date('Y-m-d H:i:s');

    $_SESSION["email"] = $owneremail;


    include('ques.php');
    if ($valid){
        updateQue($id, $questionTitle, $questionbody, $skills);
        header("Location:?action=QPage");
    }
    else{
        echo ' Try again';
    }
}

else if ($action == 'deleteQues') {
    session_start();
//    if ($_SESSION["logged"] = False){
//        header("Location:logout.php");
//    }
    $id = $_GET['id'];
    $email=$_SESSION["email"] ;
    //$email = $_GET['email'];
    deleteQues($id);
    header("Location:.?action=QPage");
    //header("Location:.?action=QPage&&email=$email");

}

else if ($action == 'fullview') {
    session_start();
//    if ($_SESSION["logged"] = False){
//        header("Location:logout.php");
//    }
    $id = $_GET['id'];
    $email=$_SESSION["email"] ;
    //$email = $_GET['email'];
    $results = getdataFromQuesById ($id);
    include('test2.php');
    //header("Location:.?action=QPage");
    //header("Location:.?action=QPage&&email=$email");

}


else if ($action =='QPage'){
    session_start();
//    if ($_SESSION["logged"] === true){
//        echo 'ghghgfhgf';
//        //header("Location:logout.php");
//    }


//
//    if (!(isset($_SESSION['login']) && !$_SESSION['login'] )) {
//    echo 'gfhgfhgfhgfh';
//        //header ("Location: login.php");
//
//    }

    //$email = $_GET['email'];
    $email=$_SESSION["email"] ;
   // echo $email;
    $results = questionDataByEmail($email);
    $getNames = Account_db::getNameByEmail($email);

    #I added this but no name appears:
    $fname = $getNames->getFname();
    include('test.php');
}
else if ($action =='logout'){
    include ('logout.php');

}

?>