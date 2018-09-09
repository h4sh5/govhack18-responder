// Note: This example requires that you consent to location sharing when
// prompted by your browser. If you see the error "The Geolocation service
// failed.", it means you probably did not give permission for the browser to
// locate you.
var map, infoWindow;


function loadHospitals() {

  var url = "https://data.qld.gov.au/api/action/datastore_search?resource_id=7de61fec-6670-4cad-a163-d955f0102cef";

  $.ajax({
            type: "GET",
            url: url,
            success: function (data) {
                //console.log(data);
                $.each(data.result.records, (function(record) {
                    var name = record["Facility Name"];
                    var address = record['Address'];
                    console.log(name);
                    console.log(address);
                }));
            },
            dataType: "jsonp"
        });


}

function initMap() {

  map = new google.maps.Map(document.getElementById('surrounding-map'), {
    center: {lat: -34.397, lng: 150.644},
    zoom: 10
  });
  infoWindow = new google.maps.InfoWindow;

  loadHospitals();

  // Try HTML5 geolocation.
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var pos = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
      };

      // infoWindow.setPosition(pos);
      // infoWindow.setContent('Location found.');
      infoWindow.open(map);
      map.setCenter(pos);
      map.setZoom(12); //12 is between city(10) and street(15)
      //mark your own location
      var marker = new google.maps.Marker({
        position: pos,
        map: map,
        title: "you are here"
      })

    }, function() {
      handleLocationError(true, infoWindow, map.getCenter());
    });
  } else {
    // Browser doesn't support Geolocation
    handleLocationError(false, infoWindow, map.getCenter());
  }
}




function handleLocationError(browserHasGeolocation, infoWindow, pos) {
  infoWindow.setPosition(pos);
  infoWindow.setContent(browserHasGeolocation ?
                        'Error: The Geolocation service failed.' :
                        'Error: Your browser doesn\'t support geolocation.');
  infoWindow.open(map);
}