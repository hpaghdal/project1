<?php
$email = $_GET ['email'];
$id = $_GET ['id'];
$title = $_GET['title'];
$skills = $_GET['skills'];
$body = $_GET['body'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Questions Page</title>
</head>
<body>
<link rel="stylesheet" href="../view/login.css">
<div class="box">
    <font><center><h2>Edit your Question here:</h2></font>
    <form action ="ques.php?email=<?php echo $email ?>" method="post">
    <input type="hidden" name="id" value="<?php echo $_GET['id']?>"><br>

        <table>
            <tr>
                <!--Question Title-->
                <td>Question Title:</td>
                <td>
                    <input type="text" name="skills" value="<?php echo $_GET["title"];?>" > <br>
<!--                    <input type="text" name="questiontitle" id="skills" value="--><?php //echo $_POST["skills"];?><!--"<br>-->
<!--                    <input type="text" name="questiontitle" id="skills" value="--><?php //echo $_POST["skills"];?><!--"<br>-->
<!--                    <input type="text" name="questiontitle" id="skills" value="--><?php //echo $_POST["skills"];?><!--"<br>-->


                </td>
            </tr>
            <tr>
                <!--Skills-->
                <td>Your Skills (Separated by Commas):</td>
                <td>
                    <input type="text" name="skills"size="40" value="<?php echo $_GET["skills"];?>">
                </td>
            </tr>
            <tr>
                <!--Question-->
                <td>Question body:</td>
                <td>
                    <input type="text" name="questionbody"size="40" value="<?php echo $_GET["body"];?>">
                </td>
                </td>
            </tr>
            <!--Submit Button-->
            <tr>
                <td>
                    <input type="Submit" name="Submit" value="Post">
                </td>
            </tr>
        </table>
</body>
</html>
