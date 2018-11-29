<?php
$email = $_GET ['email'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Questions Page</title>
</head>
<body>
<link rel="stylesheet" href="login.css">
<div class="box">
    <font><center><h2>Ask your Questions here:</h2></font>
    <form action ="../model/ques.php?email=<?php echo $email ?>" method="post">
        <table>
            <tr>
                <!--Question Title-->
                <td>Question Title:</td>
                <td>
                    <input type="text" name="questiontitle" size="40">
                </td>
            </tr>
            <tr>
                <!--Skills-->
                <td>Your Skills (Separated by Commas):</td>
                <td>
                    <input type="text" name="skills"size="40">
                </td>
            </tr>
            <tr>
                <!--Question-->
                <td>Question:</td>
                <td>
                    <textarea name="questionbody" rows="6" cols="50"></textarea>
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
