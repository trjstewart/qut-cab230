<?php
// Include the Database Class and get an instance of the PDO Connection.
include $_SERVER['DOCUMENT_ROOT'] . '/api/Database.php';
$db = Database::getInstance();

// If there was an ID passed through GET then we'll only be returning data about a single Park.
if (isset($_GET['id'])) {
	// Nice simple SQL Query to retreive all the data about a single park.
	$sql = "
	SELECT *, COALESCE((SELECT round(avg(reviews.rating),0) FROM reviews WHERE park = parks.id), 0) as rating
	FROM parks
	WHERE id = :id
	LIMIT 0, 1
	";
	$stmt = $db->dbh->prepare($sql);

	// Bind the parameters and execute our query.
	$stmt->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
	$stmt->execute();

	// Fetch the result of the query as an Array.
	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

	// Make the first character of each word in the results uppercase (ALL CAPS IS HEINOUS)
	$result[0]['name'] = ucwords(strtolower($result[0]['name']));
	$result[0]['street'] = ucwords(strtolower($result[0]['street']));
	$result[0]['suburb'] = ucwords(strtolower($result[0]['suburb']));

	// Encode the resulting data from the Query to JSON and print it.
	print json_encode($result);
	// Now the page can die because we don't need anything more from it.
	die;
}

// Query the database for the results of the search with parameters passed through GET.
// This SQL Query is relatively yucky but it's efficient to do a single query with every search paramater in it so that's how we're doing it!
$sql = "
SELECT *,
	(6371 * acos(cos(radians(-27.4710)) * cos(radians(latitude)) * cos(radians(longitude) - radians(153.0234)) + sin(radians(-27.4710)) * sin(radians(latitude)))) AS distance,
	COALESCE((SELECT round(avg(reviews.rating),0) FROM reviews WHERE park = parks.id), 0) as rating
FROM parks
WHERE name LIKE concat('%', :name, '%') AND suburb LIKE concat('%', :suburb, '%')
HAVING distance < 25000 AND rating >= :rating
ORDER BY distance
LIMIT 0, 100
";
$stmt = $db->dbh->prepare($sql);

// Bind the parameters for our query.
$stmt->bindParam(':name', $_GET['name'], PDO::PARAM_STR);
$stmt->bindParam(':suburb', $_GET['suburb'], PDO::PARAM_STR);
$stmt->bindParam(':rating', $_GET['rating'], PDO::PARAM_INT);
//$stmt->bindParam(':radius', $_GET['radius'], PDO::PARAM_INT);
//$stmt->bindParam(':lat1', $_GET['lat'], PDO::PARAM_INT);
//$stmt->bindParam(':lat2', $_GET['lat'], PDO::PARAM_INT);
//$stmt->bindParam(':lon', $_GET['lon'], PDO::PARAM_INT);
$stmt->execute();

// Fetch the result of the query as an Array.
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Make the first character of each word in the results uppercase (ALL CAPS IS HEINOUS)
for ($i = 0; $i < count($result); $i++) {
	$result[$i]['name'] = ucwords(strtolower($result[$i]['name']));
	$result[$i]['street'] = ucwords(strtolower($result[$i]['street']));
	$result[$i]['suburb'] = ucwords(strtolower($result[$i]['suburb']));
}

// Encode the resulting data from the Query to JSON and print it.
print json_encode($result);