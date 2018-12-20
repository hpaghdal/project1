
<link rel="stylesheet" href="question.css">
<div class="box">
    <title>Your Questions Page</title>


    <?php

//    require('model/database.php');
//    require('model/account_db.php');
//    require ('model/Question.php');
//    require('model/question_db.php');
//    require('model/questiondb.php');
//    require ('model/Account.php');

    //$email='tt@g' ;

//    $results = questionDataByEmail($email);
//    $getNames = Account_db::getNameByEmail($email);

    $allQuestions=getAllQuestions();
echo "Today is " .date("l, F  d, Y ");
//foreach ($getNames as $result) {
//    $fname = $result['fname'];
//    $lname = $result['lname'];
//}

echo "<h1> Welcome: $fname $lname </h1>";




//if(count($results) < 1)
//    {
//        echo "<h3> No questions yet click the 'Add Question' button to add your question</h3>";
//
//    }
//
//    else {
//        foreach ($results as $result) {
//            $id = $result['id'];
//            $title = $result['title'] ;
//            $body = $result['body'];
//            $skill = $result['skills'];
//
//            echo "<br>Title: $title";
//            echo "<br>Body: $body";
//            echo "<br>Skills: $skill <br>";
//
//            echo "<button><a href = '.?action=editQues&&id=$id'>edit<a></td></button><br>";
//            echo "<button><a href = '.?action=deleteQues&&email=$email&&id=$id'>delete<a></td><br><br></button>";
//        }
//    }
?>

    <!DOCTYPE html>
    <html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            body {font-family: Arial;}

            /* Style the tab */
            .tab {
                overflow: hidden;
                border: 1px solid #ccc;
                background-color: #f1f1f1;
            }

            /* Style the buttons inside the tab */
            .tab button {
                background-color: inherit;
                position:center;
                border: none;
                outline: none;
                cursor: pointer;
                padding: 14px 16px;
                transition: 0.3s;
                font-size: 17px;
            }

            /* Change background color of buttons on hover */
            .tab button:hover {
                background-color: #ddd;
            }

            /* Create an active/current tablink class */
            .tab button.active {
                background-color: #ccc;
            }

            /* Style the tab content */
            .tabcontent {
                display: none;
                padding: 6px 12px;
                border: 1px solid #ccc;
                border-top: none;
            }
        </style>
    </head>
    <body>

    <h2>Question Tabs</h2>
    <p>Click on the buttons below to toggle views:</p>

    <div class="tab">
       <button class="tablinks" onclick="myFunction(event, 'myQuestion')">My Questions</button>
        <button class="tablinks" onclick="myFunction(event, 'AllQuestion')">All Questions</button>
    </div>

    <div id="myQuestion" class="tabcontent">
        <h3>My Questions</h3>
        <?php
        if(count($results) < 1)
        {
        echo "<h3> No questions yet click the 'Add Question' button to add your question</h3>";

        }

        else {
        foreach ($results as $result) {
        $id = $result['id'];
        $title = $result['title'] ;
        $body = $result['body'];
        $skill = $result['skills'];

        echo "<br>Title: $title";
        echo "<br>Body: $body";
        echo "<br>Skills: $skill <br>";

        echo "<button><a href = '.?action=editQues&&id=$id'>edit<a></td></button><br>";
        echo "<button><a href = '.?action=deleteQues&&email=$email&&id=$id'>delete<a></td><br></button>";
        echo "<button><a href = '.?action=fullview&&id=$id'>Full View<a></td></button><br>";
        echo "<br><br>";
        }
        }
        ?>
    </div>





    <div id="AllQuestion" class="tabcontent">
        <h3>All Questions</h3>
        <?php
        if(count($allQuestions) < 1)
        {
            echo "<h3> No questions yet click the 'Add Question' button to add your question</h3>";

        }

        else {
            foreach ($allQuestions as $result) {
                $id = $result['id'];
                $title = $result['title'] ;
                $body = $result['body'];
                $skill = $result['skills'];

                echo "<br>Title: $title";
                echo "<br>Body: $body";
                echo "<br>Skills: $skill <br>";
                echo "<button><a href = '.?action=fullview&&id=$id'>Full View<a></td></button><br>";


            }
        }
        ?>
    </div>

    <script>
        function myFunction(evt, cityName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
        }
    </script>

    </body>
    </html>
<br><br>
    <form action ="." method= "post" >
        <input type="hidden" name = "action" value="showNewQuestion">
        <input type="hidden" name = "email" value="<?php echo "$email";?>" >
        <input type="submit" value="Add Question">

    </form>

    <form action ="." method= "post" >
        <input type="hidden" name = "action" value="logout">
        <input type="submit" value="Logout">
    </form>


<?php include ('view/footer.php');?>

</div>