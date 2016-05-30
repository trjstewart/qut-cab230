<!-- Populate the Suburbs field -->
<script> getSuburbs(); </script>

<div class="row">
	<div id="search-container" class="col lg shadow">
		<!-- Search Form needs to be able to search based on: name, subrub, rating or location -->
		<form id="search" onsubmit="return false">
			<input id="name" name="name" type="text" placeholder="Name">
			<select id="suburb" name="suburb">
				<option value="" disabled selected>Suburb</option>
			</select>
			<select id="rating" name="rating">
				<option value="0" disabled selected>Rating</option>
				<option value="5">5 Stars</option>
				<option value="4">4 Stars</option>
				<option value="3">3 Stars</option>
				<option value="2">2 Stars</option>
				<option value="1">1 Stars</option>
			</select>
			<span>Parks within <input id="location" name="location" type="text" maxlength="3" placeholder="000"> km</span>
			<button type="submit" onclick="getSearchResults()">Search</button>
		</form>
	</div>

	<!-- Are results loading? Not to start with they're not! -->
	<div id="loading" class="row">
		<div class="col text-center">
			<div>
				<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
				<br><br>
				Please wait while we fetch your results...
			</div>
		</div>
	</div>

	<!-- Are there any results to display? Not to start with they're not! -->
	<div id="results" class="row">
		<div class="col">
			<table>
				<thead>
					<th>Name</th>
					<th>Street</th>
					<th>Suburb</th>
					<th>Rating</th>
				</thead>
				<tbody id="results-body"></tbody>
			</table>
		</div>
	</div>
</div>