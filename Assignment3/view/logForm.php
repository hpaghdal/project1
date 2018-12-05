<link rel="stylesheet" href="view/login.css">
<div class="box">

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>

<body>
    <center><h2>Login here:</h2>
        <form action ="." method="post">


            <input type="hidden" name="action" value="signin" size="50">

            <table>
                <tr>
                    <td>Email Address: </td>
                    <td><input type="text" name="email" size="50"></td>
                </tr>

                <tr>
                    <td>Password:</td>
                    <td>
                        <input type="password" name="password"size="50">
                    </td>
                </tr>

                <tr>
                    <td>
                        <br>
                        <input type="submit" name="Submit" value="Login">
                    </td>
                </tr>
            </table>
        </form>
</body>
</html>
<form>

    <input type="button" onclick="location.href='?action=showreg';" value="Register" />

</form>

<br>
<?php include ('footer.php');?>

