<title>Registration Page</title>
<link rel="stylesheet" href="view/login.css">
<div class="box">

    <center><h2>Register here:</h2></font>
        <form action ="." method="post">
            <input type="hidden" name="action" value="registration">
            <table>
                <tr>
                    <!--First name-->
                    <td>First Name:</td>
                    <td>
                        <input type="text" name="firstname"size="40">
                    </td>
                </tr>
                <!Last Name-->
                <tr>
                    <!--Last name-->
                    <td>Last Name:</td>
                    <td>
                        <input type="text" name="lastname"size="40">
                    </td>
                </tr>
                <tr>

                    <!--Email-->
                    <td>E-mail/Username:</td>
                    <td>
                        <input type="text" name="email"size="40">
                    </td>
                </tr>

                <tr>
                    <!--DOB-->
                    <td>Date of Birth:</td>
                    <td>
                        <input type="date" name="DOB">
                    </td>
                </tr>
                <!--Password-->
                <tr>
                    <td>Password:</td>
                    <td>
                        <input type="password" name="password"size="40">
                    </td>
                </tr>
                <!--Submit Button-->
                <tr>
                    <td>
                        <input type="Submit" name="Submit" value="Sign up">
                    </td>
                </tr>
            </table>
        </form>
    </center>

<form>
    <input type="button" onclick="location.href='.?action=loginForm';" value="Login" />
</form>

<?php include 'footer.php';?>