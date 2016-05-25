<?php
require './lib/Database.php';

$test = new Database();

$sth = $test->dbh->prepare('SELECT password FROM users WHERE email = :email');
$sth->bindParam(':email', 'trjstewart@gmail.com', PDO::PARAM_STR);
$sth->execute();
