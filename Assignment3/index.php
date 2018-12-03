<?php
require('model/database.php');
//require('model/edit.php');
//require('model/log.php');
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
//SHOW LOGIN FORM
if ( $action == 'loginForm'){
    include('view/logForm.php');
}
//LOGIN ACTION
else if ($action == 'signin') {
    $email=$_POST ['email'];//Login Page
    $password=$_POST ['password'];//Login Page
    include('model/log.php');
    $results = auth ($email, $password);
    if ($valid && $results ){
        header("Location:?action=QPage&&email=$email");
    }
    else
        $error= "<br>Wrong username or password, please try again";
    include("error.php");
}
else if ( $action == 'showreg'){
    include('view/registrationForm.php');
}
else if ($action == 'registration') {
    $fname=$_POST ['firstname'];//registration page
    $lname=$_POST ['lastname'];//registration page
    $email=$_POST ['email'];//registration page
    $DOB=$_POST ['DOB'];//registration page
    $password=$_POST ['password'];//registration page
    include('model/registration.php');
    $results = getUserFromAccount($email);
    if ($valid) {
        if ($results) {
            echo " this email address is already registered !! please use another email.<br>";
        }
        else {
            registration($email,$fname,$lname,$DOB,$password);
            header("Location:?action=QPage&&email=$email");
        }
    }
    else {
        echo "test";
//        redirect(" <h2><b style=\"color: red; text-align: center \"> Registration not Complete </b> <h2>", "?action=finalPage'");
    }
}
//SHOW ADD QUESTION FORM
else if ( $action == 'showNewQuestion'){
    $email = filter_input( INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    include('model/QPage.php');
}
else if ($action == 'addQuestion') {
    $questionTitle = filter_input(INPUT_POST, 'questiontitle', FILTER_SANITIZE_STRING);
    $skills = filter_input(INPUT_POST, 'skills', FILTER_SANITIZE_STRING);
    $questionbody = filter_input(INPUT_POST, 'questionbody', FILTER_SANITIZE_STRING);
    $email = filter_input( INPUT_POST, 'email');
    $datetime =  date('Y-m-d H:i:s');
    $data = str_replace(' ', '', $skills);
    $skill_array = explode(",", $data);
    $skills = implode(",", $skill_array);
//Array Count
    $array_count = count($skill_array);
    include('questionValidationCheck.php');
    if ($valid == true){
        $results = userFromAccounts ($email);
        foreach ($results as $result) {
            $ownerid = $result['id'];
        }
        addQuestion($email, $ownerid, $datetime, $questionTitle, $questionbody, $skills);
        header("Location: ?action=model/QPage&&email=$email");

    }
    else{
        echo ' Try again';
    }
}
// EDIT
else if ($action == 'editQues') {
    $id = filter_input(INPUT_POST, 'id',FILTER_VALIDATE_INT);
    $dataFromQuestions = dataFromQuestionsById ($id);
    if ($id == NULL || $id == FALSE ) {
        $error = "Missing fields.";
        include('error.php');
    } else {
        include('editQuestion.php');
    }
}
//UPDATE
else if ($action == 'updateQues') {
    $id = filter_input(INPUT_POST, 'id',FILTER_VALIDATE_INT);
    $qname = filter_input(INPUT_POST, 'questiontitle', FILTER_SANITIZE_STRING);
    $qskill = filter_input(INPUT_POST, 'skills', FILTER_SANITIZE_STRING);
    $qbody = filter_input(INPUT_POST, 'questionbody', FILTER_SANITIZE_STRING);
    $email = filter_input( INPUT_POST, 'email');
    $datetime =  date('Y-m-d H:i:s');
    $data = str_replace(' ', '', $qskill);
    $skill_array = explode(",", $data);
    $skills = implode(",", $skill_array);
    //Array Count
    $array_count = count($skill_array);
    include('model/ques.php');
    if ($valid == true){
        updateQuestion($id, $qname, $qbody, $skills);
        header("Location:?action=model/Qpage&&email=$email");
    }
    else{
        echo ' Try again';
    }
}
//DELETE
else if ($action == 'deleteQues') {
    $id = filter_input(INPUT_POST, 'id',FILTER_VALIDATE_INT);
    $email = filter_input( INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    if ($id == NULL || $id == FALSE || $email == NULL || $email == FALSE ) {
        $error = "Missing fields";
        include('error.php');
    } else {
        deleteQuestion($id);
        header("Location: .?action=model/Qpage&&email=$email");
    }
}
//QUESTION DISPLAY PAGE
else if ($action =='QPage'){
    //$greetings = greetings();
    $email = $_GET['email'];
    $results = questionDataByEmail($email);
//    $dataFromQuestions = dataFromQuestions ($email);
    include('model/Qpage.php');
}

?>