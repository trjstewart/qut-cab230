<?php
try {
  $db = new PDO('mysql:host=*****;dbname=*****', $user, $pass);
} catch (PDOException $e) {
  print "Error: " . $e->getMessage() . "<br/>";
  die();
}
 ?>
