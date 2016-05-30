<script> loadPark(<?php print $_GET['id']; ?>) </script>

<div class="row"><div id="googleMap" class="col lg shadow"></div></div>

<div class="row">
	<div class="col lg">
		<div class="text-center"><strong>Park Details</strong></div>
		<span><strong>Name: </strong></span><span id="park-name"></span><br>
		<span><strong>Address: </strong></span><span id="park-address"></span><br>
		<span><strong>Rating: </strong></span><span id="park-rating"></span>
	</div>
</div>

<div class="row">
	<div class="col lg shadow">
		<form id="review" onsubmit="return false">
			<input id="comment" name="comment" type="text" placeholder="Comment">
			<select id="rating" name="rating">
				<option value="0" disabled selected>Rating</option>
				<option value="5">5 Stars</option>
				<option value="4">4 Stars</option>
				<option value="3">3 Stars</option>
				<option value="2">2 Stars</option>
				<option value="1">1 Stars</option>
			</select>
			<button type="submit" onclick="postReview()">Review</button>
		</form>
	</div>
</div>