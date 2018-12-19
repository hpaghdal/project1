
<link rel="stylesheet" href="question.css">
<div class="box">
    <title>Your Questions Page</title>

<?php
echo "Today is " .date("l, F  d, Y ");
//foreach ($getNames as $result) {
//    $fname = $result['fname'];
//    $lname = $result['lname'];
//}

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

        echo "<button><a href = '.?action=editQues&&email=$email&&id=$id'>edit<a></td></button><br>";
        echo "<button><a href = '.?action=deleteQues&&email=$email&&id=$id'>delete<a></td><br><br></button>";
    }
}
?>
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