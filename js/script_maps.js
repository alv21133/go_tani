var map;
var markers = [];

function initMap() {
   var infoWindow;

   map = new google.maps.Map(document.getElementById('map'), {
      zoom: 12, // Set the zoom level manually
      center: {
         lat: -6.4024844,
         lng: 106.7942405
      },
   });

   // This event listener will call addMarker() when the map is clicked.
   map.addListener('click', function (event) {
      if (markers.length >= 1) {
         deleteMarkers();
      }

      addMarker(event.latLng);
      var latitude = document.getElementById('lat').value = event.latLng.lat();
      var longtitude = document.getElementById('long').value = event.latLng.lng();
   });
}

// Adds a marker to the map and push to the array.
function addMarker(location) {
   var marker = new google.maps.Marker({
      position: location,
      animation: google.maps.Animation.BOUNCE,
      map: map,
      title: 'Lokasi Anda!'
   });
   markers.push(marker);
}

// Sets the map on all markers in the array.
function setMapOnAll(map) {
   for (var i = 0; i < markers.length; i++) {
      markers[i].setMap(map);
   }
}

// Removes the markers from the map, but keeps them in the array.
function clearMarkers() {
   setMapOnAll(null);
}

// Deletes all markers in the array by removing references to them.
function deleteMarkers() {
   clearMarkers();
   markers = [];
}

// var latitude = document.getElementById("lat").innerHTML;
// var longtitude = document.getElementById("long").innerHTML;
var x = document.getElementById("lat");
var y = document.getElementById("long");

function getLocation() {
   if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(showPosition, showError);
   } else {
      x.innerHTML = "Geolocation is not supported by this browser.";
   }
}

function showPosition(position) {
   // var latitude = document.getElementById('lat').value = event.latLng.lat();
   // var longtitude = document.getElementById('long').value = event.latLng.lng();
   x.value = position.coords.latitude;
   y.value = position.coords.longitude;

   var latlong = {
      lat: position.coords.latitude,
      lng: position.coords.longitude
   };

   console.log(latlong);

   map = new google.maps.Map(document.getElementById('map'), {
      zoom: 20, // Set the zoom level manually
      center: latlong,
   });

   var marker = new google.maps.Marker({
      position: latlong,
      map: map,
      title: 'Lokasi Anda!',
      animation: google.maps.Animation.BOUNCE
   });
   marker.addListener('click', marker);
   markers.push(marker);


   map.addListener('click', function (event) {
      if (markers.length >= 1) {
         deleteMarkers();
      }

      addMarker(event.latLng);
      var latitude = document.getElementById('lat').value = event.latLng.lat();
      var longtitude = document.getElementById('long').value = event.latLng.lng();
   });

}

function showError(error) {
   switch (error.code) {
      case error.PERMISSION_DENIED:
         x.innerHTML = "User denied the request for Geolocation."
         break;
      case error.POSITION_UNAVAILABLE:
         x.innerHTML = "Location information is unavailable."
         break;
      case error.TIMEOUT:
         x.innerHTML = "The request to get user location timed out."
         break;
      case error.UNKNOWN_ERROR:
         x.innerHTML = "An unknown error occurred."
         break;
   }
}