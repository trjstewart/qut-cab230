<?php
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

print_r((new Search)->byId(100));
print '<hr>';

print_r((new Search)->byName('ashgrove avenue'));
print '<hr>';

print_r((new Search)->bySuburb());
print '<hr>';

print_r((new Search)->byRating());
print '<hr>';

print_r((new Search)->byLocation());
print '<hr>';

require './views/partials/footer.html';
?>
</body>
</html>