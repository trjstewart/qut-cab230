<?php
if (isset($_POST['submit'])) { // if form submitted
    require './api/Database.php';
    require './api/User.php';
    $name = $_POST['name'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $password = User::cryptPass($_POST['pass1']);
    if (User::checkExists($email) == False) { //check that email not already in use
        User::insertUser($email, $password, $name, $dob);  //insert the user into database
    } else {
        echo '<script type="text/javascript">'
        , 'alert("User already exists. Please use a different email or login");'   //tell the user why it doesn't work
        , '</script>';
    }
}
?>
<div id="search-container" class="col lg shadow">
    <form name="regForm" class="auth" method="post" id="search">
        <h3><b>Resgister User</b> </h3>
        Name <br>
        <input type="text" name="name" id="name" required> <br><br> <span id="nameMessage" class="ErrorMessage">

        Date of birth <small>(DD/MM/YY)</small> <br>
        <input  type="text" name="dob" id="dob" onblur="validateDate(document.regForm.dob)" required> <span id="dobMessage" class="ErrorMessage"></span><br><br>

        Email <br>
        <input type="email" name="email" id="email" required><span id="emailMessage" class="ErrorMessage"> <br><br>

        Password <br>
        <input type="password" name="pass1" id="pass1" required><span id="passMessage" class="ErrorMessage"></span> <br><br>

        <br><br><br>
        <button type="submit" style="float: left" name="submit" id="submit" onsubmit="return checkForm()">Submit</button> <span id="otherMessage" class="ErrorMessage"></span>
        <br><br>
    </form>
</div>