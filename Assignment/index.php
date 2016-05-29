<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Park Finder</title>
	<link rel="stylesheet" type="text/css" href="./public/css/vanilla.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
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
				<a href="#"><li class="home"><i class="fa fa-home" aria-hidden="true"></i>Home</li></a>
				<a href="#"><li class="search"><i class="fa fa-search" aria-hidden="true"></i>Search</li></a>
				<a href="#"><li class="login"><i class="fa fa-lock" aria-hidden="true"></i>Register | Login</li></a>
			</ul>
		</div>
	</div>
	<div class="container-right">
		<div class="header">CAB230 Park Finder!</div>
		<div class="row">
			<div class="col md shadow">Left Stuff</div>
			<div class="col md shadow">Right Stuff</div>
		</div>
		<div class="row">
			<div class="col lg shadow">
				This is a LARGE box...
				<!--					<div class="test" id="googleMap" style="width:100%; height:400px;"></div>-->
			</div>
		</div>

		<br><br><br><br><br><br><br><br><br><br>

		One br between rows...
		<div class="row">
			<div class="col md shadow">Left Stuff</div>
			<div class="col md shadow">Right Stuff</div>
		</div>
		<br>
		<div class="row">
			<div class="col lg shadow">
				This is a LARGE box...
				<!--					<div class="test" id="googleMap" style="width:100%; height:400px;"></div>-->
			</div>
		</div>

		<br><br><br><br><br><br><br><br><br><br>

		Two br's between rows...
		<div class="row">
			<div class="col md shadow">Left Stuff</div>
			<div class="col md shadow">Right Stuff</div>
		</div>
		<br><br>
		<div class="row">
			<div class="col lg shadow">
				This is a LARGE box...
				<!--					<div class="test" id="googleMap" style="width:100%; height:400px;"></div>-->
			</div>
		</div>
	</div>
	<div class="footer">Created with &#10084; by Harrison Gee and Tylor Stewart</div>
</div>
</body>
</html>