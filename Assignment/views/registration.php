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

    <?php
    if (isset($_POST['submit'])) { // if form submitted
        $email = $_POST['email'];
        $password = password_hash($_POST['pass1'], PASSWORD_DEFAULT); //hash password
        if (User::checkExists($email) == False) { //check that email not already in use
            User::insertUser($email, $password);  //insert the user into database
        } else {
            print("USER ALREADY EXISTS"); //tell the user why it didn't work
        }
    }
    ?>
</head>
<body>
<?php
require 'partials/header.html';
?>
<br><br><br>

<div class="registration">
    <div class="regForm">
        <form method="post">
            <br>
            <h2>User Registration</h2>
            <div class="formText">
                Email <br>
                <input type="email" name="email" id="email" required> <br><br>

                Password <br>
                <input type="password" name="pass1" id="pass1" required> <br><br>

                Confirm Password <br>
                <input type="password" name="pass2" id="pass2" onkeyup="checkPass(); return false;" required>
                <span id="confirmMessage" class="confirmMessage"></span>
                <br><br><br>
            </div>


            <input type="submit" class="btn" name="submit" id="submit">
            <br><br>


        </form>
    </div>
</div>
<?php
require 'partials/footer.html';
?>

</body>
</html>
