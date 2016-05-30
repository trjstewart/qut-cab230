<?php

class Database {
    // Database Configuration Variables
    private static $HOST = 'srv01.binaryorange.co';     // Database URL
    private static $NAME = 'cab230_cab230';             // Database Name
    private static $USER = 'cab230_cab230';             // Database Username
    private static $PASS = 'tRKtidLWSOBwh4G';           // Database Password

    public $dbh;                // Database Handler
    private static $instance;   // Database Instance

    // Constructor: Try to connect to the database and if not throw an error.
    private function __construct() {
        try {
            $this->dbh = new PDO('mysql:host='.self::$HOST.';dbname='.self::$NAME, self::$USER, self::$PASS);
        } catch (PDOException $e) {
            print 'Error: ' . $e->getMessage() . '<br>';
            die();
        }
    }

    // Returns Singleton Class.
    public static function getInstance() {
        if (!isset(self::$instance)) {
            $obj = __CLASS__;
            self::$instance = new $obj;
        }

        return self::$instance;
    }
}