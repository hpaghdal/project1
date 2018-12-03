<?php
require('model/database.php');
//require('model/edit.php');
//require('model/log.php');
//require('model/QPage.php');
//require('model/ques.php');
//require('model/registration.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'showlog';
    }
}
if ($action == 'showlog') {
    echo "pagal";
    include ('view/logForm.php');

}
else if ($action=="signin"){
    echo "double pagal";
    include ('model/log.php');

}
else if ($action == 'showreg') {
    echo "register";
    include ('view/registrationForm.php');
}
else if ($action == 'registration') {
    $fname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING);
    $lname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING);
    $DOB = filter_input(INPUT_POST, 'DOB');
    $email = filter_input( INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = filter_input(INPUT_POST, 'password');
    include('model/registration.php');
    $results = userFromAccounts ($email);
    if ($valid == true) {
        if (count($results) > 0) {
            echo " Email address is already registered<br><br>";
            // IF EMAIL IS IN THE DATABASE GO BACK OR REGISTER OPTION
        }
        else {
            addUser($email, $fname, $lname, $DOB, $password);
            header("Location:?action=finalPage&&email=$email");
//        redirect (" <h2>  $greetings $fname $lname, <br> <b style=\"color: green; text-align: center \"> Registration Successful !! Redirecting to Display Page..... </b> <h2>", "?action=finalPage&&email=$email'");
        }
    }
    else {
        echo "test";
//        redirect(" <h2><b style=\"color: red; text-align: center \"> Registration not Complete </b> <h2>", "?action=finalPage'");
    }
}
//SHOW ADD QUESTION FORM
else if ( $action == 'showAddQuestion'){
    $email = filter_input( INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    include('model/QPage.php');
}
else if ($action == 'AddQuestion') {
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
        addQuestion($email, $ownerid, $datetime, $questiontitle, $questionbody, $skills);
//        header("Location: ?action=finalPage&&email=$email");
        redirect(" Question Insert Successfully !! Redirecting to the Blog....... ","?action=finalPage&&email=$email");
    }
    else{
        echo ' Try again';
    }
}
// EDIT QUESTIONS
else if ($action == 'editQuestion') {
    $id = filter_input(INPUT_POST, 'id',FILTER_VALIDATE_INT);
    $dataFromQuestions = dataFromQuestionsById ($id);
    if ($id == NULL || $id == FALSE ) {
        $error = "Missing or incorrect product id or category id.";
        include('error/error.php');
    } else {
        include('editQuestion.php');
    }
}
//UPDATE QUESTIONS
else if ($action == 'updateQuestion') {
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
    include('questionValidationCheck.php');
    if ($valid == true){
        updateQuestion($id, $qname, $qbody, $skills);
        header("Location:?action=finalPage&&email=$email");
    }
    else{
        echo ' Try again';
    }
}
//DELETE QUESTIONS
else if ($action == 'deleteQuestion') {
    $id = filter_input(INPUT_POST, 'id',FILTER_VALIDATE_INT);
    $email = filter_input( INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    if ($id == NULL || $id == FALSE || $email == NULL || $email == FALSE ) {
        $error = "Missing or incorrect product id or category id.";
        include('error/error.php');
    } else {
        deleteQuestion($id);
        header("Location: .?action=finalPage&&email=$email");
    }
}
//FINAL DISPLAY PAGE/ QUESTION DISPLAY PAGE
else if ($action =='finalPage'){
    $greetings = greetings();
    $email = filter_input( INPUT_GET, 'email', FILTER_SANITIZE_EMAIL);
    $results = userFromAccounts ($email);
    $dataFromQuestions = dataFromQuestions ($email);
    include('finalPage.php');
}
// LOGOUT
else if ( $action == 'logout'){
    include('logout.php');
}
?>