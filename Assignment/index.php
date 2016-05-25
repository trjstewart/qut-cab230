<?php
require './lib/Database.php';
require './lib/User.php';
require './lib/Search.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Park Finder</title>
  <link rel="stylesheet" type="text/css" href="./public/css/vanilla.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head>
<body>
  <?php
  require './views/partials/header.html';

  // Code goes here...

  require './views/partials/footer.html';
  ?>
</body>
</html>