<?php
///$user_name=$_POST ['email'];//Login Page
///$password=$_POST ['password'];//Login Page
///$firstName=$_POST ['firstname'];//registration page
///$lastName=$_POST ['lastname'];//registration page
///$email=$_POST ['email'];//registration page
///$DOB=$_POST ['DOB'];//registration page
///$password=$_POST ['password'];//registration page
$questionTitle=$_POST ['questiontitle'];//Questions page
$skills=$_POST ['skills'];//Questions page
$question=$_POST ['question'];//Questions page
?>
<!DOCTYPE HTML>
<html>
<head>
<body>
    <main>
        Question title: <?php echo $questionTitle;?><br>
        Skills: <?php echo $skills;?><br>
       Question Body: <?php echo $question;?><br>
    </main>
</body>
</html>
</head>