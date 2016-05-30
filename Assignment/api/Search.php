<?php
require './lib/Database.php';

class Search {
    function __construct() {
        $this->db = Database::getInstance();
    }

    function byId($id) {
        $sql = 'SELECT * FROM parks WHERE id = :id';
        $stmt = $this->db->dbh->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function byName($name) {
        $sql = 'SELECT * FROM parks WHERE name LIKE :name';
        $stmt = $this->db->dbh->prepare($sql);
        $name = '%'.$name.'%';
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function bySuburb($suburb) {
        return 'boobs';
    }

    function byRating($rating) {
        return 'boobs';
    }

    function byLocation($lat, $lon) {
        return 'boobs';
    }
}