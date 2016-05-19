<?php
  session_start(); //start session
  $username = $_POST['username'];
  $password = $_POST['password'];

  if ($username&&$password) {
    include ('connection.php'); //connect to DB

    //PDO $query ( username='$username' )

    while($row = mysql_fetch_assoc($query)) {
      $dbusername = $row['username'];
      $dbpassword = $row['password'];
      $dbid = $row['ID'];
    }
    if ($username==$dbusername&&$password==$dbpassword)
    {
        $_SESSION ['username']=$username;
        $_SESSION ['id']=$dbid;
    } else {
      echo"<script type=\"test/javascript\">
            alert(\"Incorrect Username or Password\")
            </script>";
    }

    }
  }
 ?>
