<?php
require '../lib/Database.php';
require '../lib/User.php';
require '../lib/Search.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Park Finder</title>
    <link rel="stylesheet" type="text/css" href="../public/css/vanilla.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <script type="text/javascript" src="../public/js/vanilla.js"></script>

</head>
<body>
<!--header-->
<?php
require 'partials/header.html';
?>
<br><br><br>

<!--form-->
<div class="registration">
    <div class="regForm">
        <form method="post">
            <br>
            <h2>User Login</h2>
            <div class="formText">
                Email<br>
                <input type="email" name="email" id="email" required><br><br>

                Password <br>
                <input type="password" name="pass1" id="pass1" required><br>
                <br>
            </div>

            <input type="submit" class="btn" name="submit" value="Login" id="submit">
            <br><br>
            <span id="errorMessage" class="errorMessage"></span>


        </form>
    </div>
</div>
<?php
require 'partials/footer.html';
?>
<?php
if (isset($_POST['submit'])) { //if form submitted
    $email = $_POST['email'];     //assign values to variables
    $password = $_POST['pass1'];
    if (User::checkExists($email) == True) {     //if email exists
        if (User::verifyPassword($email, $password) == True) { //check if password is correct
            session_start(); //start session_start
            $_SESSION ['email'] = $email;
            //session ID maybe?             //assign session variables
            print("Welcome " . $_SESSION['email'] . "!");    //welcome the user
        } else {
            print("Invalid Email/Password");
        }
    } else {
        print("User doesn't exist");
    }
}
?>
</body>
</html>
