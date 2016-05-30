function checkPass()
{
    //Store the password field objects into variables ...
    var pass1 = document.getElementById('pass1');
    var pass2 = document.getElementById('pass2');
    var message = document.getElementById('confirmMessage');
    //Compare the passwords
    if(pass1.value == pass2.value){
        //The passwords match.
        message.innerHTML = "";
        submit.disabled = false;
    }else{
        //The passwords do not match.
        submit.disabled = true;
        message.innerHTML = "Passwords Do Not Match!"
    }
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
    // Set the loading div to visible.
    document.getElementById('loading').style.visibility = 'visible';

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

    console.log('asdfasdf');
    console.log(search);

    // Now we can query our API with the search parameters. Use an AJAX request to asynchronously get search results.
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            //console.log(xhttp.responseText);
        }
    };
    var query = 'name='+search.name+'&suburb='+search.suburb+'&rating='+search.rating+'&lat='+search.location.lat+'&lon='+search.location.lon+'&radius='+search.location.radius;
    xhttp.open("GET", "/api/parks/search?"+query, true);
    xhttp.send();
}