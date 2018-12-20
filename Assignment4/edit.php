<link rel="stylesheet" href="question.css">
<div class="box">
<?php
foreach ($getdataFromQues as $result) {
    $title = $result['title'];
    $body = $result['body'];
    $skills = $result['skills'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Page</title>
</head>
<body>
    <font><center><h2>Edit your Question here:</h2></font>
    <form action ="." method="post">
        <input type="hidden" name="action" value="updateQues" size="50">
        <input type="hidden" name = "email" value="<?php echo $email ;?>">
        <input type="hidden" name="id" value="<?php echo $id;?>"><br>

        <table>
            <tr>
                <!--Question Title-->
                <td>Question Title:</td>
                <td>
                    <input type="text" name="questiontitle" value="<?php echo $title;?>" > <br>



                </td>
            </tr>
            <tr>
                <!--Skills-->
                <td>Your Skills (Separated by Commas):</td>
                <td>
                    <input type="text" name="skills"size="40" value="<?php echo $skills;?>">
                </td>
            </tr>
            <tr>
                <!--Question-->
                <td>Question body:</td>
                <td>
                    <input type="text" name="questionbody"size="40" value="<?php echo "$body";?>">
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
    <?php include ('view/footer.php');?>
