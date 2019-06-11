
//map.js
 
//Set up some of our variables.
var map; //Will contain map object.
var marker = false; ////Has the user plotted their location marker? 
        
//Function called to initialize / create the map.
//This is called when the page has loaded.
function initMap() {
 
    //The center location of our map.
    var centerOfMap = new google.maps.LatLng(predefinedLatitude, predefinedLongitude);

    //Map options.
    var options = {
      center: centerOfMap, //Set center.
      zoom: zoomLevel //The zoom value.
    };
 
    //Create the map object.
    map = new google.maps.Map(document.getElementById('map'), options);

    //Add default marker
    //https://developers.google.com/maps/documentation/javascript/markers

    //Generate default
    generateMarker(centerOfMap, 'You are here!');
    //Get the marker's location.
    if (defaultLatitude && defaultLongitude) {
        markerLocation();
    }

    //Listen for any clicks on the map.
    google.maps.event.addListener(map, 'click', function(event) {
        //Get the location that the user clicked.
        var clickedLocation = event.latLng;
        generateMarker(clickedLocation, '');
        //Get the marker's location.
        markerLocation();
    });
}
        
//This function will get the marker's current location and then add the lat/long
//values to our textfields so that we can save the location.
function markerLocation(){
    //Get location.
    var currentLocation = marker.getPosition();
    //Add lat and lng values to a field that we can save.
    document.getElementById(latitudeInputId).value = currentLocation.lat(); //latitude
    document.getElementById(longitudeInputId).value = currentLocation.lng(); //longitude
}

function generateMarker(position, markerTitle) {
    //If the marker hasn't been added.
    if(marker === false){
        //Create the marker.
        marker = new google.maps.Marker({
            position: position,
            map: map,
            draggable: true, //make it draggable
            title: markerTitle
        });
        //Listen for drag events!
        google.maps.event.addListener(marker, 'dragend', function(event){
            markerLocation();
        });
    } else{
        //Marker has already been added, so just change its location.
        marker.setPosition(position);
    }
}
        
        
//Load the map when the page has finished loading.
google.maps.event.addDomListener(window, 'load', initMap);