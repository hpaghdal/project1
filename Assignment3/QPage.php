<?php include("header.php");?>
<?php


foreach ($getNames as $result) {
    $fname = $result['fname'];
    $lname = $result['lname'];
}

echo "<h1> Welcome: $fname $lname </h1>";



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

        echo "<a href = '.?action=editQues&&email=$email&&id=$id'>edit<a></td><br>";
        echo "<a href = '.?action=deleteQues&&email=$email&&id=$id'>delete<a></td><br><br>";
    }
}
?>
    <form action ="." method= "post" >
        <input type="hidden" name = "action" value="showNewQuestion">
        <input type="hidden" name = "email" value="<?php echo "$email";?>" >
        <input type="submit" value="Add Question">
    </form>

    <form action ="." method= "post" >
        <input type="hidden" name = "action" value="loginForm">
        <input type="submit" value="Logout">
    </form>


</div>

<?php include ('view/footer.php');?>