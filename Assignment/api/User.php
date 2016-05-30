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

    public static function insertUser($email, $password)
    {
        $db = Database::getInstance();
        $sth = $db->dbh->prepare('INSERT INTO users (email, password)
                                  VALUES (:email, :password)');//insert into the database
        $sth->bindParam(':email', $email);
        $sth->bindParam(':password', $password);
        $sth->execute();
    }

    public static function verifyPassword($email, $password)
    {
        $db = Database::getInstance();
        $sth = $db->dbh->prepare('SELECT * FROM users WHERE email = :email'); //find the users email
        $sth->bindParam(':email', $email);
        $sth->execute();
        while ($row = $sth->fetch(PDO::FETCH_ASSOC)) //get their hashed password from db
        {
            $hash = $row['password'];   //is there a better way of getting results from queries?
        }

        if ($verify = password_verify($password, $hash)) { //compare entered password and hashed password
            return True;
        }
    }
}
