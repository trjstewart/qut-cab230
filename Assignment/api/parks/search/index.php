<?php
// Include the Database Class and get an instance of the PDO Connection.
include $_SERVER['DOCUMENT_ROOT'] . '/api/Database.php';
$db = Database::getInstance();

var_dump($_GET);



// Get (hehehe) out search parameters.


//$sql = 'SELECT * FROM parks WHERE id = :id';
//$stmt = $db->dbh->prepare($sql);
//$stmt->bindParam(':id', $id, PDO::PARAM_INT);
//$stmt->execute();
//print json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));

print 'tits and ass';