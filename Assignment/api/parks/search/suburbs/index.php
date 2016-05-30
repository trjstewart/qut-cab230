<?php
// Include the Database Class and get an instance of the PDO Connection.
include $_SERVER['DOCUMENT_ROOT'] . '/api/Database.php';
$db = Database::getInstance();

// Query the Database for Distinct (unique) suburbs.
$sql = 'SELECT DISTINCT suburb FROM parks ORDER BY suburb ASC';
$stmt = $db->dbh->prepare($sql);
$stmt->execute();

// Fetch the result of the query as an Array.
$suburbs = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Make the first character of each word in the Suburbs uppercase (ALL CAPS IS HEINOUS)
for ($i = 0; $i < count($suburbs); $i++) {
	$suburbs[$i]['suburb'] = ucwords(strtolower($suburbs[$i]['suburb']));
}

// Encode the resulting data from the Query to JSON and print it.
print json_encode($suburbs);





