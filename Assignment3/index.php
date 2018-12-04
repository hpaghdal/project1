<?php include 'view/header.php';  ?>
<?php

require('model/database.php');
require('model/account_db.php');
require('model/question_db.php');
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
    $email= $_POST ['email'];//Login Page
    $password=$_POST ['password'];//Login Page
    include('log.php');
    $results = auth ($email, $password);
    if ($valid && $results ){
        header("Location:.?action=QPage&&email=$email");
    }
    else
        $error= "<br>Wrong username or password, please try again";
    //include("error.php");
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
    include('registration.php');
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

//    $data = str_replace(' ', '', $skills);
//    $skill_array = explode(",", $data);
//    $skills = implode(",", $skill_array);
//Array Count
//    $array_count = count($skill_array);
    include('ques.php');
    if ($valid){
        $ownerid = getIdByEmail ($owneremail);
        addNewQuestion($owneremail,$ownerid,$datetime,$questionTitle,$questionbody,$skills);
        header("Location:?action=QPage&&email=$owneremail");

    }
    else{
        echo ' Try again';
    }
}
// EDIT
else if ($action == 'editQues') {
    $id = $_GET['id'];
    $email = $_GET['email'];
    $getdataFromQues = getdataFromQuesById ($id);
    include('edit.php');
}
//UPDATE
else if ($action == 'updateQues') {
    $owneremail = $_POST['email'];
    $id = $_POST['id'];
    $questionTitle= $_POST ['questiontitle'];//Questions page
    $skills=$_POST ['skills'];//Questions page
    $questionbody=$_POST ['questionbody'];//Questions page
    $skillsArray=(explode(",",$skills));
    $datetime =  date('Y-m-d H:i:s');


//    $id = filter_input(INPUT_POST, 'id',FILTER_VALIDATE_INT);
//    $qname = filter_input(INPUT_POST, 'questiontitle', FILTER_SANITIZE_STRING);
//    $qskill = filter_input(INPUT_POST, 'skills', FILTER_SANITIZE_STRING);
//    $qbody = filter_input(INPUT_POST, 'questionbody', FILTER_SANITIZE_STRING);
//    $email = filter_input( INPUT_POST, 'email');
//    $datetime =  date('Y-m-d H:i:s');
//    $data = str_replace(' ', '', $qskill);
//    $skill_array = explode(",", $data);
//    $skills = implode(",", $skill_array);
//    //Array Count
//    $array_count = count($skill_array);
    include('ques.php');
    if ($valid){
        updateQue($id, $questionTitle, $questionbody, $skills);
        header("Location:?action=QPage&&email=$owneremail");
    }
    else{
        echo ' Try again';
    }
}
//DELETE
else if ($action == 'deleteQues') {
    $id = $_GET['id'];
    $email = $_GET['email'];
    deleteQues($id);
    header("Location:.?action=QPage&&email=$email");

}
//QUESTION DISPLAY PAGE
else if ($action =='QPage'){

    //$greetings = greetings();
    $email = $_GET['email'];
    $results = questionDataByEmail($email);
    $getNames = getNameByEmail($email);
    include('QPage.php');
}

?>