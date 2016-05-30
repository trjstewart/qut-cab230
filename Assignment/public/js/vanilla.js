/*-------------------------------------------------------*/
/*-----------------| Reg Page Functions |----------------*/
/*-------------------------------------------------------*/
//Function      : checkPass()
//Description   : check that the user has successfully confirmed their password
function validateDate(date)
{
    var error = document.getElementById('dobMessage');

    var validformat=/^\d{2}\/\d{2}\/\d{4}$/; //Basic check for format validity
    var returnval=false;
    if (!validformat.test(date.value)) {
        error.innerHTML = "Invalid format. Please correct to (DD/MM/YYYY)";
        submit.disabled = true;

    } else{ //Detailed check for valid date ranges
        var dayfield=date.value.split("/")[0];
        var monthfield=date.value.split("/")[1];
        var yearfield=date.value.split("/")[2];
        var dayobj = new Date(yearfield, monthfield-1, dayfield);
        if ((dayobj.getMonth()+1!=monthfield)||(dayobj.getDate()!=dayfield)||(dayobj.getFullYear()!=yearfield))  {
            submit.disabled = true;
            error.innerHTML = "Invalid Day, Month, or Year range detected";
        }
        else {
            error.innerHTML = "";
            submit.disabled = false;
            returnval=true
        }

    }
    if (returnval==false) date.select();
    return returnval
}


//Function      : checkForm()
//Description   : helper function to check the form before submitting.
function checkForm() {
    var date = document.getElementById('dob');
    if(validateDate(date)) {
        return false;
    }
    if(checkPass()) {
        return false;
    }


    return true;

}

/*-------------------------------------------------------*/
/*---------------| Search Page Functions |---------------*/
/*-------------------------------------------------------*/

// Function     : getSuburbs()
// Description  : Get a list of suburbs from the server to be used in populating the suburbs selection in the search form.
function getSuburbs() {
    // Use an AJAX request to asynchronously get a list of Suburbs.
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        // If the request is successful, use the response to populate the form.
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            var suburbs = JSON.parse(xhttp.responseText);
            // Loop through the suburbs and append each of them to the form as an option in the suburb select element.
            for (var i = 0; i < suburbs.length; i++) {
                // Using the '+=' operator allows up to append to the element, rather than replace it.
                document.getElementById('suburb').innerHTML += "<option value='" + suburbs[i].suburb + "'>" + suburbs[i].suburb + "</option>";
            }
        }
    };
    xhttp.open("GET", "/api/parks/search/suburbs", true);
    xhttp.send();
}

// Function     : getSearchResults()
// Description  : Get the search input from the form, query the server with requested parameters and display results.
function getSearchResults() {
    // Set the loading div to visible and hide any existing results
    document.getElementById('loading').style.display = 'unset';
    document.getElementById('results').style.display = 'none';

    // Get each of the inputs for search criteria.
    var search = {name: '', suburb: '', rating: 0, location: {lat: 0, lon: 0, radius: 0}};
    search.name = document.getElementById('name').value;
    search.suburb = document.getElementById('suburb').value;
    search.rating = document.getElementById('rating').value;
    search.location.radius = document.getElementById('location').value;

    // Get the users current location and append it to the search parameters if there was a radius entered.
    navigator.geolocation.getCurrentPosition(function (position) {
        search.location.lat = position.coords.latitude;
        search.location.lon = position.coords.longitude;
    });

    // Now we can query our API with the search parameters. Use an AJAX request to asynchronously get search results.
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            //console.log(xhttp.responseText);

            // Clear any old results from the table...
            document.getElementById('results-body').innerHTML = '';

            // Results are back! Populate the results table!
            var results = JSON.parse(xhttp.responseText);
            for (var i = 0; i < results.length; i++) {
                // Describe what I have done here... ********************
                document.getElementById('results-body').innerHTML +=
                    '<tr onclick="window.document.location=\'/index.php?page=park&id='+ results[i].id +'\';">' +
                        '<td>' + results[i].name + '</td>' +
                        '<td>' + results[i].street + '</td>' +
                        '<td>' + results[i].suburb + '</td>' +
                        '<td>' + results[i].rating + '</td>' +
                    '</tr>'
                ;
            }

            // Results have finished loading now so we can hide the loading div and show the results.
            document.getElementById('loading').style.display = 'none';
            document.getElementById('results').style.display = 'unset';
        }
    };
    var query = 'name='+search.name+'&suburb='+search.suburb+'&rating='+search.rating+'&lat='+search.location.lat+'&lon='+search.location.lon+'&radius='+search.location.radius;
    xhttp.open("GET", "/api/parks/search?"+query, true);
    xhttp.send();
}

/*-------------------------------------------------------*/
/*----------------| Park Page Functions |----------------*/
/*-------------------------------------------------------*/

// Function     :
// Description  :
function loadPark(park) {
    console.log('Loading Data for Park: ' + park);

    // Fetch the Park Data from the Database using AJAX.
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            var results = JSON.parse(xhttp.responseText);
            renderMap(results);
        }
    };
    xhttp.open("GET", "/api/parks/search?id=" + park, true);
    xhttp.send();
}

/*-------------------------------------------------------*/
/*---------------| Google Maps Functions |---------------*/
/*-------------------------------------------------------*/

// Function     : renderMap(markerLocations)
// Description  : Renders a Map using the Google Maps API in the div #googleMap.
function renderMap(locations) {
    // Set configuration options for the map.
    var mapProp = {
        center:new google.maps.LatLng(-27.4710, 153.0234),
        zoom:9,
        mapTypeId:google.maps.MapTypeId.ROADMAP,
        disableDefaultUI:true
    };

    // Create the Map.
    var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);

    // Add markers to the map for each location provided.
    for (var i = 0; i < locations.length; i++) {
        // Set the Location, Create a Marker and add it to the Map.
        var location = new google.maps.LatLng(locations[i].latitude, locations[i].longitude);
        var marker = new google.maps.Marker({ position: location });
        marker.setMap(map);

        // Add an InfoWindow to the Marker.
        var infowindow = new google.maps.InfoWindow({ content:'<a href="/index.php?page=park&id=' + locations[i].id + '">' + locations[i].name + '</a>' });
        google.maps.event.addListener(marker, 'click', function() { infowindow.open(map,marker); });
    }

}