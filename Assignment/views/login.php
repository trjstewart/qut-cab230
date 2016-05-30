<head>
    <?php
    if (isset($_POST['submit'])) { //if form submitted
        require './api/Database.php';
        require './api/User.php';
        $email = $_POST['email'];     //assign values to variables
        $password = $_POST['pass1'];
        if (User::checkExists($email) == True) {     //if email exists
            if (User::verifyPassword($email, $password) == True) { //check if password is correct
                //session_start(); //start session
                $_SESSION ['email'] = $email;
                
                $_SESSION['name'] = User::getName($email);
                $_SESSION['id'] = User::getId($email);
                //assign session variables
                header('Location: index.php?page=home');
                   //welcome the user
            } else {
                echo '<script type="text/javascript">'
                , 'alert("Incorrect password");'   //tell the user why it doesn't work
                , '</script>';
            }
        } else {
            echo '<script type="text/javascript">'
            , 'alert("User doesn\'t exist");'   //tell the user why it doesn't work
            , '</script>';
        }
    }
    ?>
</head>
<body>


<div id="search-container" class="col lg shadow">
    <form name="regForm" class="auth" method="post" id="search">
        <h3><b>User login</b> </h3>

        Email <br>
        <input type="email" name="email" id="email" required><span id="emailMessage" class="ErrorMessage"> <br><br>

        Password <br>
        <input type="password" name="pass1" id="pass1" required><span id="passMessage" class="ErrorMessage"></span> <br><br>

        <br><br><br>
        <button type="submit" style="float: left" name="submit" id="submit" onsubmit="return checkForm()">Login</button> <span id="otherMessage" class="ErrorMessage"></span>
        <br><br>
    </form>
</div>
</body>

