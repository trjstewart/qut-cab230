<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Park Finder</title>
	<link rel="stylesheet" type="text/css" href="./public/css/vanilla.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<script src="./public/js/vanilla.js"></script>
	<script src="http://maps.googleapis.com/maps/api/js"></script>
	<script>
		function initialize() {
			var mapProp = {
				center:new google.maps.LatLng(-27.4710, 153.0234),
				zoom:11,
				mapTypeId:google.maps.MapTypeId.ROADMAP,
				disableDefaultUI:true
			};
			var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

			var location = new google.maps.LatLng(-27.4710, 153.0234);
			var marker = new google.maps.Marker({
				position: location
			});
			marker.setMap(map);

			var infowindow = new google.maps.InfoWindow({
				content:"Hello World!"
			});

			google.maps.event.addListener(marker, 'click', function() {
				infowindow.open(map,marker);
			});
		}
		google.maps.event.addDomListener(window, 'load', initialize);
	</script>
</head>
<body>
<div class="container-page">
	<div class="container-left">
		<div class="logo"><img src="public/img/bird_logo.png"/></div>
		<div class="nav">
			<ul>
				<a href="index.php?page=home"><li class="home"><i class="fa fa-home" aria-hidden="true"></i>Home</li></a>
				<a href="index.php?page=search"><li class="search"><i class="fa fa-search" aria-hidden="true"></i>Search</li></a>
				<a href="index.php?page=auth"><li class="login"><i class="fa fa-lock" aria-hidden="true"></i>Register | Login</li></a>
			</ul>
		</div>
	</div>
	<div class="container-right">
		<div class="header">CAB230 Park Finder!</div>

		<!-- Because we can't use a framework, let's make our own page-router or sorts -->
		<?php
		if($_GET['page'] == 'home') include './views/home.php';
		else if($_GET['page'] == 'search') include './views/search.php';
		else if($_GET['page'] == 'auth') include './views/auth.php';
		else include './views/home.php'
		?>



	</div>
	<div class="footer">Created with &#10084; by Harrison Gee and Tylor Stewart</div>
</div>
</body>
</html>