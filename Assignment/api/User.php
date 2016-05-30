<?php

class User
{
    private function __construct()
    {

    }

    public static function checkExists($email)
    {
        $db = Database::getInstance(); //create database object
        $sth = $db->dbh->prepare('SELECT email FROM users WHERE email = :email');
        $sth->bindParam(':email', $email);
        $sth->execute();    //find all users with that email
        $count = $sth->rowCount(); //count them
        if ($count > 0) {
            return True;
        } else {            //if > 0, it exists.
            return False;
        }
    }

    public static function insertUser($email, $password, $name, $dob)
    {
        if ($email != null || $email != '' && $password != null || $password != '' && $dob != null || $dob != '' && $name != null || $name != '') {
            $db = Database::getInstance();
            $sth = $db->dbh->prepare('INSERT INTO users (email, password, name, dob)
                                  VALUES (:email, :password, :name, :dob)');//insert into the database
            $sth->bindParam(':email', $email);
            $sth->bindParam(':password', $password);
            $sth->bindParam(':name', $name);
            $sth->bindParam(':dob', $dob);
            $sth->execute();
        } else {
            echo "";
        }
    }
    public static function cryptPass($input, $rounds = 9) {
        $salt = "";
        $saltChars = array_merge(range('A', 'Z'), range('a', 'z'), range(0, 9));
        for ($i = 0; $i <22; $i++) {
            $salt .= $saltChars[array_rand($saltChars)];
        }
        return crypt($input, sprintf('$2y$%02d$', $rounds) . $salt);
    }

    public static function verifyPassword($email, $password)
    {
        $db = Database::getInstance();
        $sth = $db->dbh->prepare('SELECT * FROM users WHERE email = :email'); //find the users email
        $sth->bindParam(':email', $email);
        $sth->execute();
        while ($row = $sth->fetch(PDO::FETCH_ASSOC)) //get their hashed password from db
        {
            $hash = $row['password'];   //store result in $hash
        }


        if (crypt($password, $hash) == $hash) { //compare entered password and hashed password
            return True;
        } else {
            return false;
        }
    }

    public static function getName($email) {
        $db = Database::getInstance();
        $sth = $db->dbh->prepare('SELECT name FROM users WHERE email = :email'); //find the users email
        $sth->bindParam(':email', $email);
        $sth->execute();

        while ($row = $sth->fetch(PDO::FETCH_ASSOC)) //get their name from db
        {
            $name = $row['name'];   //store result in $name
        }
        if($name != null || $name != "") {
            return $name;
        }

    }
    public static function getId($email) {
        $db = Database::getInstance();
        $sth = $db->dbh->prepare('SELECT id FROM users WHERE email = :email'); //find the users email
        $sth->bindParam(':email', $email);
        $sth->execute();

        while ($row = $sth->fetch(PDO::FETCH_ASSOC)) //get their name from db
        {
            $id = $row['id'];   //store result in $name
        }
        if($id != null || $id != "") {
            return $id;
        }

    }
}
