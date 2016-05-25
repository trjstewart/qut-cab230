<?php

class Database {
    const HOST = 'srv01.binaryorange.co';
    const NAME = 'cab230_cab230';
    const USER = 'cab230_cab230';
    const PASS = 'tRKtidLWSOBwh4G';

    function __construct() {
        try {
            $dbh = new PDO('mysql:host='.self::HOST.';dbname='.self::NAME, self::USER, self::PASS);
        } catch (PDOException $e) {
            print 'Error: ' . $e->getMessage() . '<br>';
            die();
        }
    }
}